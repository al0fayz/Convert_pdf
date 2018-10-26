<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\TablePosition;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\JcTable;
use PhpOffice\PhpWord\SimpleType\TextAlignment;
use App\Response;
use PDF;

class PrintController extends Controller
{ 
	protected function text(){
		$value = DB::table('response')->get();
		$sum = DB::table('response')->sum('value');
		$value1 = DB::table('access')->get();
		$sum1 = DB::table('access')->sum('value');

		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$phpWord->setDefaultFontName('Times New Roman');
		$phpWord->setDefaultFontSize(10);
		$fontStyle = new \PhpOffice\PhpWord\Style\Font();
		$fontStyle->setBold(true);

		$pStyle = array('align' => 'both');
		$kanan = array('align' => 'right');
		//set justify align
		$phpWord->setDefaultParagraphStyle($pStyle);
		// $phpWord->addParagraphStyle($pStyle);
		$section = $phpWord->addSection();

		$section->getStyle()->setPageNumberingStart(1); //number page
		$header = array('size' => 14, 'bold' => true);
		$section->addText('Zone file response', $header);
		$section->addText("In November we've analyzed 94,020 domains with our crawlers, The results from that crawl are used to generate this report. Not every domain contains a website. This chapter gives insights into the responses of the domains.", array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$response = $section->addText("Response");
		$response->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/cake_res.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

			// 1. table response
		$section->addTextBreak(3);
		$table = $section->addTable();
		$i = 0;
		foreach ($value as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$per[$i] = round(($val[$i] / $sum) * 100);
			$table->addRow();
			$table->addCell(300)->addImage("images/sp-{$i}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$table->addCell(4000)->addText("{$name[$i]}");
			$table->addCell(1500)->addText("{$val[$i]}");
			$table->addCell(1500)->addText("{$per[$i]} %");
			$i++;
		}
		$section->addTextBreak(1);
		$section->addText("When we Index a domain there can be four type of response. If a domain name is 'available' it means that we have received a valid response with status code 1xx or 2xx . A domain can also result in a 'host not found' response . This means there is no IP configured in the DNS for this domain . If the response is a 'redirect' then we received a service side redirect with status code 3xx. The last response type is an 'Access denied', this means the crawler could not access the website and recieved status code 4xx, 5xx, or 9xx. The following paragraph gives more details about the cause of the access denied.");
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$denied = $section->addText("Access denied");
		$denied->setFontStyle($fontStyle);
		$section->addText("An 'Access denied' means that the crawler can't access the website. This can occur when the DNS is not configured, the server is unavailable or access is not allowed. in most cases there is no website (DNS is not configured) but sometimes there is, in that case the hosting provider, Webmaster or CMS of the website doesn't allow the crawler to visit the website. if a domain result in an Access denied the 'Status Code' explains why access was denied. In the following chart you can see the top 5 reasons why some domains resulted in an access denied. ");
		$section->addImage('images/span_1.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			// 2. table access
		$section->addTextBreak(1);
		$table1 = $section->addTable();
		$a = 0;
		foreach ($value1 as $key => $dt) {
			$name[$a] = $dt->name;
			$val[$a] = $dt->value;
			$code[$a] = $dt->code;
			$per[$a] = round(($val[$a] / $sum1) * 100);
			$row = $table1->addRow();
			$row = $table1->addCell(200)->addImage("images/sp-{$a}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$row = $table1->addCell(1000)->addText("{$code[$a]}");
			$row = $table1->addCell(4500)->addText("{$name[$a]}");
			$row = $table1->addCell(1500)->addText("{$val[$a]}");
			$row = $table1->addCell(1500)->addText("{$per[$a]} %");
			$a++;
		}

		$section->addPageBreak();
		//page 2
		$available = $section->addText("Available");
		$available->setFontStyle($fontStyle);
		$section->addText("When a domain result in an actual website we say the response is available. We have not looked at the actual content et. The content of a domain is important for reneals. A domain that is available can be 'developed' or 'undeveloped' . A developed website is a ebsite that contains real, manually created content. Somebody took time and effort to create this website . The opposite is an undeveloped website . This is q website that contain a placeholder (default page from the registar), is paked . Contains almost no content or shows the content from another website(frame).");
		$section->addImage('images/span_2.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Yes");
		$section->addText('No', array('valign' => 'right'));
		$dev = $section->addText("Developed");
		$dev->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/cake_dev.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		
		$developed = DB::table('developed')->get();
		$c = 0;
		foreach ($developed as $key => $val) {
			$val3[$c] = $val->value;
			$c++;
		}
		$sum3 = array_sum($val3);
		$section->addTextBreak(3);
		$table = $section->addTable();
		$iz = 0;
		foreach ($developed as $key => $dt) {
			$name1[$iz] = $dt->name;
			$val1[$iz] = $dt->value;
			$per1[$iz] = round(($val1[$iz] / $sum3) * 100);
			$dev = $table->addRow();
			$table->addCell(300)->addImage("images/sp-{$iz}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$dev = $table->addCell(4000)->addText("{$name1[$iz]}");
			$dev = $table->addCell(1500)->addText("{$val1[$iz]}");
			$dev = $table->addCell(1500)->addText("{$per1[$iz]} %");
			$iz++;
		}
		$section->addText("A developed ebsite is a website that contains real, manually created content . somebody took time and effort in creating this website. Developed website are good for renewals. when we index the website we look at the content and classify it. if our craler is able to identify features like a company name, phone number and adress then we classify it as a 'Bussiness' website . If the website offers the possibility to buy products or services on it we call it 'e-Commerce'. A website classified as 'content' is mostly a personal website sometimes websites also fullfill a special task like a blog or a forum. ");
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$undev = $section->addText("Undeveloped");
		$undev->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/cake_un.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$undeveloped = DB::table('undeveloped')->get();
		$d = 0;
		foreach ($undeveloped as $key => $dl) {
			$val4[$d] = $dl->value;
			$d++;
		}
		$sum4 = array_sum($val4);
		$table = $section->addTable();
		$un1 = 0;
		foreach ($undeveloped as $key => $dt) {
			$name2[$un1] = $dt->name;
			$val2[$un1] = $dt->value;
			$per2[$un1] = round(($val2[$un1] / $sum4) * 100);
			$un = $table->addRow();
			$table->addCell(300)->addImage("images/sp-{$un1}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$un = $table->addCell(4000)->addText("{$name2[$un1]}");
			$un = $table->addCell(1500)->addText("{$val2[$un1]}");
			$un = $table->addCell(1500)->addText("{$per2[$un1]} %");
			$un1++;
		}
		$section->addText("An undevelop website is a website that contains a placeholder (default page from the registrar), is parked , has almost no content or shows the content of another website  (frame). An undeveloped website is not good for renewals . if people didn't take the effort to put a website on the domain, then the chance of a domain being renewad is lower. ");
		// $section = $phpWord->addSection(array('breakType' => 'continuous'));

		$section->addPageBreak();
		//page 3
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$w3b = $section->addText("Website redirect");
		$w3b->setFontStyle($fontStyle);
		$section->addText("A redirect is a technique which can be used to redirect a domain to or URL, A redirect can be implemented 'server side' or 'client side' . A server side redirect is done b using a 3xx status code followed by the new destination . A client side redirect is done by using a piece of javascript or a META refresh . The crawler cannot execute javascript so onl detects server side redirect . The following chart show what TLD's are redirected b domains:");
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/bar_1.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$website = DB::table('website')->get();
		$e = 0;
		foreach ($website as $key => $dt) {
			$val5[$e] = $dt->value;
			$e++;
		}
		$sum5 = array_sum($val5);
		$table = $section->addTable();
		$we1 = 0;
		foreach ($website as $key => $dt) {
			$name3[$we1] = $dt->website;
			$val3[$we1] = $dt->value;
			$per3[$we1] = round(($val3[$we1] / $sum5) * 100);
			$un = $table->addRow();
			$table->addCell(300)->addImage("images/sp-{$we1}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$un = $table->addCell(4000)->addText("{$name3[$we1]}");
			$un = $table->addCell(1500)->addText("{$val3[$we1]}");
			$un = $table->addCell(1500)->addText("{$per3[$we1]} %");
			$we1++;
		}
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$r3g = $section->addText("Top 15 regitrars");
		$r3g->setFontStyle($fontStyle);
		$section->addText("In the following chart we display the top 15 registrars . it's not only the number of domains that is important to know but also how these domains are being used . The chart shows for each registrar how many domains the have and how man are actually avilable (contain a website ) and developed (higher is better).");
		$registrars = DB::table('registrars')->get();
		$f = 0;
		foreach ($registrars as $key => $dt) {
			$active[$f] = $dt->active;
			$not_active[$f] = $dt->not_active;
			$f++;
		}
		$table = $section->addTable();
		$r3gis = $table->addRow();
		$r3gis = $table->addCell(3000)->addText("Hosting");
		$r3gis = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$r3gis = $table->addCell(1500)->addText("Domains");
		$r3gis = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$r3gis = $table->addCell(1500)->addText("Available");
		$r3gis = $table->addCell(500)->addImage("images/sp-2.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$r3gis = $table->addCell(1500)->addText("Developed");
		$rg = 0;
		foreach ($registrars as $key => $dt) {
			$hosting[$rg] = $dt->hosting;
			$avi[$rg] = $dt->available;
			$deve[$rg] = $dt->developed;
			$dom[$rg] = $dt->domains;
			$r3gis = $table->addRow();
			$r3gis = $table->addCell(3000)->addText("{$hosting[$rg]}");
			$r3gis = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$r3gis = $table->addCell(1500)->addText("{$dom[$rg]}");
			$r3gis = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$r3gis = $table->addCell(1500)->addText("{$avi[$rg]}");
			$r3gis = $table->addCell(500)->addImage("images/sp-2.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$r3gis = $table->addCell(1500)->addText("{$deve[$rg]}");
			$rg++;
		}
		$cellRowSpan = array('bgColor' => '000066');
		$table = $section->addTable();
		$box_in = $table->addRow();
		$box_in = $table->addCell(9000, $cellRowSpan)->addText("Note");
		$box_in = $table->addRow();
		$box_in = $table->addCell(9000, $cellRowSpan)->addText("In order to determine the register Dataprovider.com relies on the availability of WHOIS information that can have a deviation and a mapping between the DNS nameserver and registrars.");

		$section->addPageBreak();
		//page 4
		$h3art = $section->addText("Heartbeat");
		$h3art->setFontStyle($fontStyle);
		$section->addText("Every month we index all the website we track again and update all the varaiables . Besides updating we also archive all the result and keep track of all the changes. The monthly number of weighted changes result in a heartbeat.");
		$h3ar = $section->addText("Heartbeat");
		$h3ar->setFontStyle($fontStyle);
		$section->addImage('images/span_3.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Active");
		$section->addText('Not active', array('valign' => 'right'));
		$puls3 = $section->addText("Pulse");
		$puls3->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/cake_heart.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		// $section->addTextBreak(1);
		$heartbeat = DB::table('heartbeat')->get();
		$g = 0;
		foreach ($heartbeat as $key => $dt) {
			$val6[$g] = $dt->value;
			$g++;
		}
		$sum6 = array_sum($val6);
		$table = $section->addTable();
		$he1 = 0;
		foreach ($heartbeat as $key => $dt) {
			$name6[$he1] = $dt->pulse_name;
			$val6[$he1] = $dt->value;
			$per6[$he1] = round(($val6[$he1] / $sum6) * 100);
			$heart1 = $table->addRow();
			$table->addCell(300)->addImage("images/sp-{$he1}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$heart1 = $table->addCell(3000)->addText("{$name6[$he1]}");
			$heart1 = $table->addCell(1500)->addText("{$val6[$he1]}");
			$heart1 = $table->addCell(1500)->addText("{$per6[$he1]} %");
			$he1++;
		}
		// $section = $phpWord->addSection(array('breakType' => 'continuous'));
		$section->addText("Not every change has the same importance . Changing the CMS of a website has a higher  impact then only adding another email address to a contact page. By weighting every changing variable we calculate a pulse. Basically the strength of the pulse indicates if a website is being used and maintained by its owners or not.");
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$top0 = $section->addText("Top 10 registrars");
		$top0->setFontStyle($fontStyle);
		$table = $section->addTable();
		$r3gis = $table->addRow();
		$r3gis = $table->addCell(3000)->addText("Hosting");
		$r3gis = $table->addCell(3000)->addText("");
		$r3gis = $table->addCell(1500)->addText("Domains");
		$r3gis = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$r3gis = $table->addCell(1500)->addText("Active");
		$r3gis = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$r3gis = $table->addCell(1500)->addText("Not active");
		$rg01 = 0;
		foreach ($registrars as $key => $dt) {
			$hosting[$rg01] = $dt->hosting;
			$active[$rg01] = $dt->active;
			$not_a[$rg01] = $dt->not_active;
			$dom[$rg01] = $dt->domains;
			$r3gis = $table->addRow();
			$r3gis = $table->addCell(3000)->addText("{$hosting[$rg01]}");
			$r3gis = $table->addCell(3000)->addText("");
			$r3gis = $table->addCell(1500)->addText("{$dom[$rg01]}");
			$r3gis = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$r3gis = $table->addCell(1500)->addText("{$active[$rg01]}");
			$r3gis = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$r3gis = $table->addCell(1500)->addText("{$not_a[$rg01]}");
			$rg01++;
		}

		$section->addPageBreak();
		//page 5
		$renewa = $section->addText("Renewal probability");
		$renewa->setFontStyle($fontStyle);
		$section->addText("At Dataprovider.com we see milions of domains come online and go offline. we took features of these domains like their content, age, popularit and activity and created a model to predict if a domain will get renewed or not. We call this score the 'Reneal probability'.");
		$ren = $section->addText("Renewal probability");
		$ren->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);

		$probability = DB::table('probability')->get();
		$h = 0;
		foreach ($probability as $key => $dt) {
			$val7[$h] = $dt->value;
			$h++;
		}
		$sum7 = array_sum($val7);

		$table = $section->addTable();
		$ojo = 0;
		foreach ($probability as $key => $dt) {
			$name7[$ojo] = $dt->name;
			$val7[$ojo] = $dt->value;
			$per7[$ojo] = round(($val7[$ojo] / $sum7) * 100);
			$heart1 = $table->addRow();
			$table->addCell(300)->addImage("images/sp-{$ojo}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$heart1 = $table->addCell(3000)->addText("{$name7[$ojo]}");
			$heart1 = $table->addCell(1500)->addText("{$val7[$ojo]}");
			$heart1 = $table->addCell(1500)->addText("{$per7[$ojo]} %");
			$ojo++;
		}
		$section->addText("If a domain has a low reneal probability, then it is very likely the domain will drop within a year . Domain with a high renewal probability will most likely renew.");
		$section->addImage('images/cake_prob.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$risk_re = $section->addText("Top 15 registrars with high renewal risk");
		$risk_re->setFontStyle($fontStyle);
		$section->addText("In the following chart we display the top 15 registrar and their renewal probability . It's not only the number of domains that is important to know, but also how many of these domains get renewad . The chart shows for each registrar how many domains they have and how many domains are probably not going to get renewed (higher is better).");
		$table = $section->addTable();
		$r3gi = $table->addRow();
		$r3gi = $table->addCell(3000)->addText("Top 15 registrars");
		$r3gi = $table->addCell(3000)->addText("");
		$r3gi = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$r3gi = $table->addCell(1500)->addText("Domains");
		$r3gi = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$r3gi = $table->addCell(1500)->addText("Low renewal est.");
		$rg09 = 0;
		foreach ($registrars as $key => $dt) {
			$hosting1[$rg09] = $dt->hosting;
			$dom1[$rg09] = $dt->domains;
			$r3gi = $table->addRow();
			$r3gi = $table->addCell(3000)->addText("{$hosting1[$rg09]}");
			$r3gi = $table->addCell(3000)->addText("");
			$r3gi = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$r3gi = $table->addCell(1500)->addText("{$dom1[$rg09]}");
			$r3gi = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$r3gi = $table->addCell(1500)->addText("");
			$rg09++;
		}
		$section->addPageBreak();
		//page 6
		$host = $section->addText("Hosting");
		$host->setFontStyle($fontStyle);
		$section->addText("If a domain results in an actual website, parking page or placeholder then this website is hosted at a hosting company. This chapter gives insight in what companies these websites are hosted at, and in what countries.");
		$ghost = $section->addText("Hosting company");
		$ghost->setFontStyle($fontStyle);
		$section->addText("The hosting company is also known as the AS company. This company is responsible for the network on which the website is hosted and owns the IP address the website is on. The hosting company corresponds with the assigned AS number . The following chart shows were most website are hosted and how many are developed.");
		$company = DB::table('hosting_company')->get();
		$table = $section->addTable();
		$comp_1 = $table->addRow();
		$comp_1 = $table->addCell(3000)->addText("Company");
		$comp_1 = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$comp_1 = $table->addCell(1500)->addText("Domains");
		$comp_1 = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$comp_1 = $table->addCell(1500)->addText("Developed");
		$comp_1 = $table->addCell(500)->addImage("images/sp-2.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$comp_1 = $table->addCell(1500)->addText("Undeveloped");
		$wkwk = 0;
		foreach ($company as $key => $dt) {
			$company[$wkwk] = $dt->company;
			$domains[$wkwk] = $dt->domains;
			$dev_09[$wkwk] = $dt->developed;
			$un_dev[$wkwk] = $dt->undeveloped;

			$comp_1 = $table->addRow();
			$comp_1 = $table->addCell(3000)->addText("{$company[$wkwk]}");
			
			$comp_1 = $table->addCell(500)->addImage("images/sp-0.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$comp_1 = $table->addCell(1500)->addText("{$domains[$wkwk]}");
			$comp_1 = $table->addCell(500)->addImage("images/sp-1.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$comp_1 = $table->addCell(1500)->addText("{$dev_09[$wkwk]}");
			$comp_1 = $table->addCell(500)->addImage("images/sp-2.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$comp_1 = $table->addCell(1500)->addText("{$un_dev[$wkwk]}");
			$wkwk++;
		}
		$bos = $section->addText("Hosting country");
		$bos->setFontStyle($fontStyle);
		$section->addImage('images/span_4.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$country = DB::table('hosting_country')->get();
		$i = 0;
		foreach ($country as $key => $dt) {
			$val8[$i] = $dt->value;
			$i++;
		}
		$sum8 = array_sum($val8);
		$table = $section->addTable();
		$ayu = 0;
		foreach ($country as $key => $dt) {
			$name8[$ayu] = $dt->country;
			$val8[$ayu] = $dt->value;
			$per8[$ayu] = round(($val8[$ayu] / $sum8) * 100);
			$try = $table->addRow();
			$table->addCell(300)->addImage("images/sp-{$ayu}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$try = $table->addCell(3000)->addText("{$name8[$ayu]}");
			$try = $table->addCell(1500)->addText("{$val8[$ayu]}");
			$try = $table->addCell(1500)->addText("{$per8[$ayu]} %");
			$ayu++;
		}
		$section->addTextBreak(2);
		$section->addText("Hosting country refers to the country where the website is hosted. Our crawler determines the hosting country based on the IP Address of a website. The hosting country can differ from the country where the company behind the website is based.");


		$section->addPageBreak();
		//page 7
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$sub_d = $section->addText("Subdomains");
		$sub_d->setFontStyle($fontStyle);
		$section->addText("The subdomain refers to the first part of a domain. The most used subdomain in domain names is 'www' but there are also other subdomains, such as 'shop' or 'wiki'. The following chart shows how man domains use subdomains (other than www).");
		$section->addImage('images/span_5.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Yes");
		$section->addText('No', array('valign' => 'right'));
		$dis_b = $section->addText("Distribution");
		$dis_b->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/cake_dis.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$dis = DB::table('distribution')->get();
		$j = 0;
		foreach ($dis as $key => $dt) {
			$val9[$j] = $dt->value;
			$j++;
		}
		$sum9 = array_sum($val9);
		$table = $section->addTable();
		$zi0 = 0;
		foreach ($dis as $key => $dt) {
			$name9[$zi0] = $dt->name;
			$val9[$zi0] = $dt->value;
			$per9[$zi0] = round(($val9[$zi0] / $sum9) * 100);
			$try = $table->addRow();
			$table->addCell(300)->addImage("images/sp-{$zi0}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$try = $table->addCell(3000)->addText("{$name9[$zi0]}");
			$try = $table->addCell(1500)->addText("{$val9[$zi0]}");
			$try = $table->addCell(1500)->addText("{$per9[$zi0]} %");
			$zi0++;
		}
		$section->addText("The number of subdomains used by a website tells something about the size of the website. Big companies tend to have multiple subdomains. The following charts show how many subdomains website have if they use subdomains and what names the used most often for a subdomain.");
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$ts10 = $section->addText("Top 10 subdomians");
		$ts10->setFontStyle($fontStyle);
		$section->addText("In the following chart we display the top 10 subdomains and how many domains use that subdomain. The subdomain refers to the first part of a domain.");



			// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(public_path('Report/report.docx'));

		// Saving the document as HTML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
		$objWriter->save('../resources/views/php_office/report_office.blade.php');

	}
	public function index(){
		$this->text();
		// $pdf = PDF::loadView('php_office/report');
		// return $pdf->stream('invoice.pdf');
	}
	public function pdf(){
		$response = DB::table('response')->get();
		$value1 = DB::table('response')->select('value')->get();
		$a = 0;
		foreach ($response as $key => $dt) {
			$val1[$a] = $dt->value;
			$a++;
		}
		$sum1 = array_sum($val1);
		$access = DB::table('access')->get();
		$b = 0;
		foreach ($access as $key => $dl) {
			$val2[$b] = $dl->value;
			$b++;
		}
		$sum2 = array_sum($val2);
		
		//page2
		$developed = DB::table('developed')->get();
		$c = 0;
		foreach ($developed as $key => $val) {
			$val3[$c] = $val->value;
			$c++;
		}
		$sum3 = array_sum($val3);
		$undeveloped = DB::table('undeveloped')->get();
		$d = 0;
		foreach ($undeveloped as $key => $dl) {
			$val4[$d] = $dl->value;
			$d++;
		}
		$sum4 = array_sum($val4);
		//page 3
		$website = DB::table('website')->get();
		$e = 0;
		foreach ($website as $key => $dt) {
			$val5[$e] = $dt->value;
			$e++;
		}
		$sum5 = array_sum($val5);
		$registrars = DB::table('registrars')->get();
		$f = 0;
		foreach ($registrars as $key => $dt) {
			$active[$f] = $dt->active;
			$not_active[$f] = $dt->not_active;
			$f++;
		}
		$sum_active = array_sum($active);
		$sum_not = array_sum($not_active);
		//page4
		$heartbeat = DB::table('heartbeat')->get();
		$g = 0;
		foreach ($heartbeat as $key => $dt) {
			$val6[$g] = $dt->value;
			$g++;
		}
		$sum6 = array_sum($val6);
		//page5
		$probability = DB::table('probability')->get();
		$h = 0;
		foreach ($probability as $key => $dt) {
			$val7[$h] = $dt->value;
			$h++;
		}
		$sum7 = array_sum($val7);
		//page6
		$company = DB::table('hosting_company')->get();
		$country = DB::table('hosting_country')->get();
		$i = 0;
		foreach ($country as $key => $dt) {
			$val8[$i] = $dt->value;
			$i++;
		}
		$sum8 = array_sum($val8);
		//page7
		$dis = DB::table('distribution')->get();
		$j = 0;
		foreach ($dis as $key => $dt) {
			$val9[$j] = $dt->value;
			$j++;
		}
		$sum9 = array_sum($val9);
		$sub = DB::table('subdomain')->get();
		$k = 0;
		foreach ($sub as $key => $dt) {
			$val10[$k] = $dt->value;
			$k++;
		}
		$sum10 = array_sum($val10);
		//page8
		$dns = DB::table('dns')->get();
		$l = 0;
		foreach ($dns as $key => $dt) {
			$val11[$l] = $dt->value;
			$l++;
		}
		$sum11 = array_sum($val11);
		$dns_txt = DB::table('dns_txt')->get();
		$m = 0;
		foreach ($dns_txt as $key => $dt) {
			$val12[$m] = $dt->value;
			$m++;
		}
		$sum12 = array_sum($val12);
		$mx_domains = DB::table('mx_domains')->get();
		$n = 0;
		foreach ($mx_domains as $key => $dt) {
			$val13[$n] = $dt->value;
			$n++;
		}
		$sum13 = array_sum($val13);
		//page9
		$dns_ns = DB::table('dns_ns')->get();
		$o = 0;
		foreach ($dns_ns as $key => $dt) {
			$val14[$o] = $dt->value;
			$o++;
		}
		$sum14 = array_sum($val14);
		//page 10
		$complet = DB::table('completeness')->get();
		//page11
		$ssl = DB::table('ssl_type')->get();
		$p = 0;
		foreach ($ssl as $key => $dt) {
			$val15[$p] = $dt->value;
			$p++;
		}
		$sum15 = array_sum($val15);
		//page 12
		$issue = DB::table('ssl_issue')->get();
		$q = 0;
		foreach ($issue as $key => $dt) {
			$name[$q] = $dt->name;
			$val16[$q] = $dt->value;
			$q++;
		}
		$sum16 = array_sum($val16);
		//page13
		$language = DB::table('language')->get();
		$r = 0;
		foreach ($issue as $key => $dt) {
			$name[$r] = $dt->name;
			$val17[$r] = $dt->value;
			$r++;
		}
		$sum17 = array_sum($val17);
		$countries = DB::table('countries')->get();
		$s = 0;
		foreach ($issue as $key => $dt) {
			$name[$s] = $dt->name;
			$val18[$s] = $dt->value;
			$s++;
		}
		$sum18 = array_sum($val18);
		$page_w = DB::table('pages_website')->get();
		$t = 0;
		foreach ($page_w as $key => $dt) {
			$name[$t] = $dt->name;
			$val19[$t] = $dt->value;
			$t++;
		}
		$sum19 = array_sum($val19);
		//page14
		$social_media = DB::table('social_media')->get();
		$u = 0;
		foreach ($social_media as $key => $dt) {
			$name[$u] = $dt->name;
			$val20[$u] = $dt->value;
			$u++;
		}
		$sum20 = array_sum($val20);
		$social_type = DB::table('social_media_type')->get();
		$v = 0;
		foreach ($social_type as $key => $dt) {
			$name[$v] = $dt->name;
			$val21[$v] = $dt->value;
			$v++;
		}
		$sum21 = array_sum($val21);
		$data = [
			'response' =>$response,
			'access' => $access,
			'developed' => $developed,
			'undeveloped' => $undeveloped,
			'website' => $website,
			'regis' =>$registrars,
			'heartbeat' =>$heartbeat,
			'prob' => $probability,
			'company' => $company,
			'country' => $country,
			'dis' => $dis,
			'sub' => $sub,
			'dns' => $dns,
			'dns_txt' => $dns_txt,
			'mx' => $mx_domains,
			'dns_ns' => $dns_ns,
			'complet' => $complet,
			'ssl' => $ssl,
			'issue' =>$issue,
			'language' => $language,
			'countries' => $countries,
			'page' => $page_w,
			'social_media' => $social_media,
			'social_type' => $social_type,
			'sum1' => $sum1,
			'sum2' => $sum2,
			'sum3' => $sum3,
			'sum4' => $sum4,
			'sum5' => $sum5,
			'sum6' => $sum6,
			'sum7' => $sum7,
			'sum8' => $sum8,
			'sum9' => $sum9,
			'sum10' => $sum10,
			'sum11' => $sum11,
			'sum12' => $sum12,
			'sum13' => $sum13,
			'sum14' => $sum14,
			'sum15' =>$sum15,
			'sum16' => $sum16,
			'sum17' => $sum17,
			'sum18' => $sum18,
			'sum19' => $sum19,
			'sum20' => $sum20,
			'sum21' => $sum21,
		];
		$pdf = PDF::loadView('php_office/result', $data)->setPaper('a4');
		return $pdf->stream('invoice.pdf');
	}

}

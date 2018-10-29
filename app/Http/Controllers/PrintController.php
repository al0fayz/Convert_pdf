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
			$r3gis = $table->addCell(3000)->addImage("images/table_res-{$rg01}.png", array('width' => 50, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
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
		$sub = DB::table('subdomain')->get();
		$k = 0;
		foreach ($sub as $key => $dt) {
			$val10[$k] = $dt->value;
			$k++;
		}
		$sum10 = array_sum($val10);
		$table = $section->addTable();
		$zi0z = 0;
		foreach ($sub as $key => $dt) {
			$name10[$zi0z] = $dt->name;
			$val10[$zi0z] = $dt->value;
			$per10[$zi0z] = round(($val10[$zi0z] / $sum10) * 100);
			$sub_d = $table->addRow();
			$sub_d = $table->addCell(3000)->addText("{$name10[$zi0z]}");
			$sub_d = $table->addCell(3000)->addImage("images/table_sub-{$zi0z}.png", array('width' => 50, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$sub_d = $table->addCell(1500)->addText("{$val10[$zi0z]}");
			$sub_d = $table->addCell(1500)->addText("{$per10[$zi0z]} %");
			$zi0z++;
		}
		$section->addPageBreak();
		//page 8
		$dnz = $section->addText("DNS");
		$dnz->setFontStyle($fontStyle);
		$section->addText("The domain Name System (DNS) is a naming system for doamin names. It translate domain names to numerical IP address. ");
		$dnz_type = $section->addText("DNS type");
		$dnz_type->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/bar_2.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$dns = DB::table('dns')->get();
		$l = 0;
		foreach ($dns as $key => $dt) {
			$val11[$l] = $dt->value;
			$l++;
		}
		$sum11 = array_sum($val11);
		$table = $section->addTable();
		$bg0 = 0;
		foreach ($dns as $key => $dt) {
			$name11[$bg0] = $dt->name;
			$val11[$bg0] = $dt->value;
			$per11[$bg0] = round(($val11[$bg0] / $sum11) * 100);
			$dn_s = $table->addRow();
			$dn_s = $table->addCell(300)->addImage("images/sp-{$bg0}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$dn_s = $table->addCell(3000)->addText("{$name11[$bg0]}");
			$dn_s = $table->addCell(1500)->addText("{$val11[$bg0]}");
			$dn_s = $table->addCell(1500)->addText("{$per11[$bg0]} %");
			$bg0++;
		}
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$d_txt = $section->addText("DNS TXT");
		$d_txt->setFontStyle($fontStyle);
		$section->addText("Dataprovider.com does not only index the website, we also index the DNS records. For each domain we collect the A(IPv4), AAAA coverage of these records in the zone file.");
		$section->addImage('images/span_6.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

		$dns_txt = DB::table('dns_txt')->get();
		$m = 0;
		foreach ($dns_txt as $key => $dt) {
			$val12[$m] = $dt->value;
			$m++;
		}
		$sum12 = array_sum($val12);
		$table = $section->addTable();
		$bg01 = 0;
		foreach ($dns_txt as $key => $dt) {
			$name12[$bg01] = $dt->name;
			$val12[$bg01] = $dt->value;
			$ket12[$bg01] = $dt->ket;
			$per12[$bg01] = round(($val12[$bg01] / $sum12) * 100);
			$dn_tx = $table->addRow();
			$dn_tx = $table->addCell(300)->addImage("images/sp-{$bg01}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$dn_tx = $table->addCell(2000)->addText("{$name12[$bg01]}");
			$dn_tx = $table->addCell(1000)->addText("{$val12[$bg01]}");
			$dn_tx = $table->addCell(1000)->addText("{$per12[$bg01]} %");
			$dn_tx = $table->addCell(4000)->addText("{$ket12[$bg01]} %");
			$bg01++;
		}
		$mx_d = $section->addText("Top 5 MX domians");
		$mx_d->setFontStyle($fontStyle);
		$mx_domains = DB::table('mx_domains')->get();
		$n = 0;
		foreach ($mx_domains as $key => $dt) {
			$val13[$n] = $dt->value;
			$n++;
		}
		$sum13 = array_sum($val13);
		$table = $section->addTable();
		$mli = 0;
		foreach ($mx_domains as $key => $dt) {
			$name13[$mli] = $dt->name;
			$val13[$mli] = $dt->value;
			$per13[$mli] = round(($val13[$mli] / $sum13) * 100);
			$dn_mx = $table->addRow();
			$dn_mx = $table->addCell(3000)->addText("{$name13[$mli]}");
			$dn_mx = $table->addCell(3000)->addImage("images/table_mx-{$mli}.png", array('width' => 50, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$dn_mx = $table->addCell(1000)->addText("{$val13[$mli]}");
			$dn_mx = $table->addCell(1000)->addText("{$per13[$mli]} %");
			$mli++;
		}
		$section->addPageBreak();
		//page 9
		$aaa = $section->addText("DNS AAAA records IPV6");
		$aaa->setFontStyle($fontStyle);
		$section->addText("Every device on the internet is assigned a unique IP. with the rapid growth of the internet in the 1990s, it became evident that far more address would be needed to connect devices than the IPV4 address spaced had available. IPV6 was to deal with the longanticipated problem of IPv4 address exhaustion . IPv6 is intented to replace IPv4. Not many devices make use of IPv6 yet. The following chart show the availibility of IPv6. ");
		$section->addImage('images/span_7.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Yes");
		$section->addText('No', array('valign' => 'right'));
		$ns_nm = $section->addText("DNS NS(Nameserver)");
		$ns_nm->setFontStyle($fontStyle);
		$section->addText("The NS record (nameserver) is a computer that is permanently connected to the internet and translates domain names into IP address. it contains the DNS of domain with all IP address that belong to that domain. Mostly the NS record contains a hostname of the register were the domain is registered . The following chart shows the most used nameserver (registars).");
		$top10_ns = $section->addText("Top 10 DNS NS domains");
		$top10_ns->setFontStyle($fontStyle);
		$dns_ns = DB::table('dns_ns')->get();
		$o = 0;
		foreach ($dns_ns as $key => $dt) {
			$val14[$o] = $dt->value;
			$o++;
		}
		$sum14 = array_sum($val14);
		$table = $section->addTable();
		$milo = 0;
		foreach ($dns_ns as $key => $dt) {
			$name14[$milo] = $dt->name;
			$val14[$milo] = $dt->value;
			$per14[$milo] = round(($val14[$milo] / $sum14) * 100);
			$dn_mx = $table->addRow();
			$dn_mx = $table->addCell(3000)->addText("{$name14[$milo]}");
			$dn_mx = $table->addCell(3000)->addImage("images/table_ns-{$milo}.png", array('width' => 50, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$dn_mx = $table->addCell(1000)->addText("{$val14[$milo]}");
			$dn_mx = $table->addCell(1000)->addText("{$per14[$milo]} %");
			$milo++;
		}
		$section->addPageBreak();
		//page 10
		$who_is = $section->addText("WHOIS");
		$who_is->setFontStyle($fontStyle);
		$section->addText("The WHOIS (~who is) database contains the registration information for internet resources such as domain names. WHOIS informataion has limited availability via registrars and registries. Dataprovider.com has the WHOIS records for many domains, but not all of them.");
		$who_co = $section->addText("WHOIS coverage");
		$who_co->setFontStyle($fontStyle);
		$section->addImage('images/span_8.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Yes");
		$section->addText('No', array('valign' => 'right'));
		$priv = $section->addText("Privacy protection");
		$priv->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/cake_priv.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$privacy = DB::table('privacy')->get();
		$y0y = 0;
		foreach ($privacy as $key => $dt) {
			$val15a[$y0y] = $dt->value;
			$y0y++;
		}
		$sum0y = array_sum($val15a);
		$table = $section->addTable();
		$miloz = 0;
		foreach ($privacy as $key => $dt) {
			$name14a[$miloz] = $dt->name;
			$val14a[$miloz] = $dt->value;
			$per14a[$miloz] = round(($val14a[$miloz] / $sum0y) * 100);
			$dn_mx = $table->addRow();
			$dn_mx = $table->addCell(300)->addImage("images/sp-{$miloz}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$dn_mx = $table->addCell(3000)->addText("{$name14a[$miloz]}");
			$dn_mx = $table->addCell(1000)->addText("{$val14a[$miloz]}");
			$dn_mx = $table->addCell(1000)->addText("{$per14a[$miloz]} %");
			$miloz++;
		}
		$section->addText("Most domain names registered through a registrar require the collection of essential contact information, such as the registrant's name, email adress, mailing address, phone number etc. This information is used in case dispute arises about the domain name. This information is displayed in the global whois system which is public and can be viewed by anyone. if you would like to keep your contact information private for a domain then ou can use a WHOIS privacy service like WhoisGuard, Domains by Proxy or Whois agent. Not every registrant fills out all his information . The following chart shows the completeness of the available  WHOIS information.");
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$ness = $section->addText("Completeness");
		$ness->setFontStyle($fontStyle);
		$complet = DB::table('completeness')->get();
		$table = $section->addTable();
		$milo9 = 0;
		foreach ($complet as $key => $dt) {
			$name14z[$milo9] = $dt->name;
			$val14z[$milo9] = $dt->value;
			$per14z[$milo9] = round($val14z[$milo9] / 1000);
			$dn_mxc = $table->addRow();
			$dn_mxc = $table->addCell(3000)->addText("{$name14z[$milo9]}");
			$dn_mxc = $table->addCell(3000)->addImage("images/table_com-{$milo9}.png", array('width' => 50, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$dn_mxc = $table->addCell(1000)->addText("{$val14z[$milo9]}");
			$dn_mxc = $table->addCell(1000)->addText("{$per14z[$milo9]} %");
			$milo9++;
		}
		$section->addPageBreak();
		//page 11
		$Ssl = $section->addText("SSL");
		$Ssl->setFontStyle($fontStyle);
		$section->addText("SSL (Secure Sockets Layers) is a security technology that encrypts communication between a browser and a server. You can recognize if a website uses SSL by checking if there is a small green lock in the address bar.");
		$section->addText("SSl certificates are utilized by millions of online bussinesses and individuals to decrease the risk of sensitive information being stolen or tempered with by hackers or identify thieves.");
		$Ssl_e = $section->addText("SSL enabled");
		$Ssl_e->setFontStyle($fontStyle);
		$section->addImage('images/span_9.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Yes");
		$section->addText('No', array('valign' => 'right'));
		$section->addText("When we index a website we always start by resolving the hostname. we check if there is a valid response and obtain the IP address. We use this IP address to setup  an SSL connection betwen the crawler and the server. After authentication the spider retrieves all the SSL certificate information such as the SSL type, issuer organization, and expiration dates.");
		$Ssl_ty = $section->addText("SSL type");
		$Ssl_ty->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/cake_ssl.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$ssl = DB::table('ssl_type')->get();
		$p = 0;
		foreach ($ssl as $key => $dt) {
			$val15[$p] = $dt->value;
			$p++;
		}
		$sum15 = array_sum($val15);
		$table = $section->addTable();
		$mau = 0;
		foreach ($ssl as $key => $dt) {
			$name14a1[$mau] = $dt->name;
			$val14a1[$mau] = $dt->value;
			$per14a1[$mau] = round(($val14a1[$mau] / $sum15) * 100);
			$s_sl = $table->addRow();
			$s_sl = $table->addCell(300)->addImage("images/sp-{$mau}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$s_sl = $table->addCell(3000)->addText("{$name14a1[$mau]}");
			$s_sl = $table->addCell(1000)->addText("{$val14a1[$mau]}");
			$s_sl = $table->addCell(1000)->addText("{$per14a1[$mau]} %");
			$mau++;
		}
		$section->addText("There are 3 type of certificate available: Domain validation, Organization Validation, and Extended validation . Domain validation is default.");
		$section->addPageBreak();
		//page 12
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$sen_s = $section->addText("Privacy sensitive websites using SSL");
		$sen_s->setFontStyle($fontStyle);
		$section->addText("privacy sensitive websites are websites  that store personal information such as contact or payment details. Websites that offer the possibility to create an account, log into a system, fill in a contact form or process a payment are examples of privacy sensitive websites. these websites should have an SSL certificate installed and transmit the information via https. The following chart shows how many privacy sensitive websites have SSL installed. ");
		$section->addImage('images/span_10.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Yes");
		$section->addText('No', array('valign' => 'right'));
		$sen_sui = $section->addText("SSL issuer organization");
		$sen_sui->setFontStyle($fontStyle);
		$section->addText("The certificate issuer organization is responsible for delivering the certificate to a website . An SSL certificate is a digital certificate that authenticates the identity of a website and encrypts information sent. These certificates can only be issued by a certificate Authority . The following chart shows the top issuer organization.");
		$sen_suiz = $section->addText("Top 10 SSL issuer organization");
		$sen_suiz->setFontStyle($fontStyle);
		$issue = DB::table('ssl_issue')->get();
		$q = 0;
		foreach ($issue as $key => $dt) {
			$name[$q] = $dt->name;
			$val16[$q] = $dt->value;
			$q++;
		}
		$sum16 = array_sum($val16);
		$table = $section->addTable();
		$rf = 0;
		foreach ($issue as $key => $dt) {
			$nam1[$rf] = $dt->name;
			$va1[$rf] = $dt->value;
			$pe1[$rf] = round(($va1[$rf] /$sum16) *100);
			$issue_i = $table->addRow();
			$issue_i = $table->addCell(3000)->addText("{$nam1[$rf]}");
			$issue_i = $table->addCell(3000)->addImage("images/table_ssl-{$rf}.png", array('width' => 50, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$issue_i = $table->addCell(1000)->addText("{$va1[$rf]}");
			$issue_i = $table->addCell(1000)->addText("{$pe1[$rf]} %");
			$rf++;
		}
		$section->addPageBreak();
		//page 13
		$cont_t = $section->addText("Content");
		$cont_t->setFontStyle($fontStyle);
		$section->addText("if there is a website available on the domain the Dataprovider.com indexes 10-20 pages of each website . Using this content we can identity language country, size of the website and the use of social media.");
		$l4ng = $section->addText("Language");
		$l4ng->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$language = DB::table('language')->get();
		$r = 0;
		foreach ($issue as $key => $dt) {
			$name[$r] = $dt->name;
			$val17[$r] = $dt->value;
			$r++;
		}
		$sum17 = array_sum($val17);
		$table = $section->addTable();
		$mz1 = 0;
		foreach ($language as $key => $dt) {
			$n1[$mz1] = $dt->name;
			$v1[$mz1] = $dt->value;
			$p1[$mz1] = round(($v1[$mz1] / $sum17) * 100);
			$lang_3 = $table->addRow();
			$lang_3 = $table->addCell(300)->addImage("images/sp-{$mz1}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$lang_3 = $table->addCell(3000)->addText("{$n1[$mz1]}");
			$lang_3 = $table->addCell(1000)->addText("{$v1[$mz1]}");
			$lang_3 = $table->addCell(1000)->addText("{$p1[$mz1]} %");
			$mz1++;
		}
		$section->addImage('images/cake_lang.png', array('width' => 200, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$section->addText("We currently recognize languages from 50 different countries. Our crawler determines the language of a website by using an n-gram model. An n-gram is a contiguous sequence of n items from a given sequence of text or speech. An n-gram model models sequences, notably natural languages, using the statistical properties of n-gram. The chart above shows the top there detected languages.");
		$c0u = $section->addText("Countries");
		$c0u->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/bar_3.png', array('width' => 200, 'height' => 120, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$countries = DB::table('countries')->get();
		$s = 0;
		foreach ($issue as $key => $dt) {
			$name[$s] = $dt->name;
			$val18[$s] = $dt->value;
			$s++;
		}
		$sum18 = array_sum($val18);
		$table = $section->addTable();
		$kj = 0;
		foreach ($countries as $key => $dt) {
			$n12[$kj] = $dt->name;
			$v12[$kj] = $dt->value;
			$p12[$kj] = round(($v12[$kj] / $sum18) * 100);
			$coun7 = $table->addRow();
			$coun7 = $table->addCell(300)->addImage("images/sp-{$kj}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$coun7 = $table->addCell(3000)->addText("{$n12[$kj]}");
			$coun7 = $table->addCell(1000)->addText("{$v12[$kj]}");
			$coun7 = $table->addCell(1000)->addText("{$p12[$kj]} %");
			$kj++;
		}
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$section->addText(" Country refers to the land where the website is located or where the website originated from. We determine the country of a website based on multiple variables such as hosting country. language on the website , top-level domain and contact details.");

		$p4g = $section->addText("Pages per website");
		$p4g->setFontStyle($fontStyle);
		$section->addImage('images/span_11.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$page_w = DB::table('pages_website')->get();
		$t = 0;
		foreach ($page_w as $key => $dt) {
			$name[$t] = $dt->name;
			$val19[$t] = $dt->value;
			$t++;
		}
		$sum19 = array_sum($val19);
		$table = $section->addTable();
		$kj1 = 0;
		foreach ($page_w as $key => $dt) {
			$n12e[$kj1] = $dt->name;
			$v12e[$kj1] = $dt->value;
			$p12e[$kj1] = round(($v12e[$kj1] / $sum19) * 100);
			$coun7 = $table->addRow();
			$coun7 = $table->addCell(300)->addImage("images/sp-{$kj1}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$coun7 = $table->addCell(3000)->addText("{$n12e[$kj1]}");
			$coun7 = $table->addCell(1000)->addText("{$v12e[$kj1]}");
			$coun7 = $table->addCell(1000)->addText("{$p12e[$kj1]} %");
			$kj1++;
		}
		$section->addText("Pages refers to the estimated amount of pages a website contains. it is accurate up to 500 pages, which means larger website are indexed at 500 pages. We review the internal links to provide an etimation of the amount of pages a website contains.");
		$section->addPageBreak();
		//page 14
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$s0cial = $section->addText("Social Media");
		$s0cial->setFontStyle($fontStyle);
		$section->addText("Many people and companies use social media these days. Social media allows individuals to interact with one another, exchanging details about their lives such as biographical data, professional information, personal photos and up-to-the-minute thoghts. Website use social media to interact with their (potential) customers.");
		$section->addImage('images/span_12.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section->addText("Yes");
		$section->addText('No', array('valign' => 'right'));
		$s0cial_t = $section->addText("Social media per website type");
		$s0cial_t->setFontStyle($fontStyle);
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$section->addImage('images/bar_4.png', array('width' => 200, 'height' => 120, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$social_type = DB::table('social_media_type')->get();
		$v = 0;
		foreach ($social_type as $key => $dt) {
			$name[$v] = $dt->name;
			$val21[$v] = $dt->value;
			$v++;
		}
		$sum21 = array_sum($val21);
		$table = $section->addTable();
		$rw = 0;
		foreach ($social_type as $key => $dt) {
			$nm12[$rw] = $dt->name;
			$vl12[$rw] = $dt->value;
			$pr12[$rw] = round(($vl12[$rw] / $sum21) * 100);
			$coun7 = $table->addRow();
			$coun7 = $table->addCell(300)->addImage("images/sp-{$rw}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$coun7 = $table->addCell(3000)->addText("{$nm12[$rw]}");
			$coun7 = $table->addCell(1000)->addText("{$vl12[$rw]}");
			$coun7 = $table->addCell(1000)->addText("{$pr12[$rw]} %");
			$rw++;
		}
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$section->addText("The usage of social media differs per website type. Bussines and eCommerce websites tend to have a higher penetration of social media because they use social media to engage with their audience. The chart above shows the penetration of different platforms for each website type.");
		$s0cial_pl = $section->addText("Social media platforms");
		$s0cial_pl->setFontStyle($fontStyle);
		$section->addImage('images/span_13.png', array('width' => 450, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
		$section = $phpWord->addSection(
			array(
				'colsNum'   => 2,
				'colsSpace' => 1440,
				'breakType' => 'continuous',
			)
		);
		$social_media = DB::table('social_media')->get();
		$u = 0;
		foreach ($social_media as $key => $dt) {
			$name[$u] = $dt->name;
			$val20[$u] = $dt->value;
			$u++;
		}
		$sum20 = array_sum($val20);
		$table = $section->addTable();
		$rw01 = 0;
		foreach ($social_media as $key => $dt) {
			$nm[$rw01] = $dt->name;
			$vl[$rw01] = $dt->value;
			$pr[$rw01] = round(($vl[$rw01] / $sum20) * 100);
			$soc_3 = $table->addRow();
			$soc_3 = $table->addCell(300)->addImage("images/sp-{$rw01}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$soc_3 = $table->addCell(3000)->addText("{$nm[$rw01]}");
			$soc_3 = $table->addCell(1000)->addText("{$vl[$rw01]}");
			$soc_3 = $table->addCell(1000)->addText("{$pr[$rw01]} %");
			$rw01++;
		}
		$section->addText("This chart shows the available social media platforms that are found on the homepages of available website. There are many social media platforms available like Facebook, Twiter, and Linkedin. we determine the social media platform based upon the domain name in the social media profile.");
		$section->addTextBreak(2);
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(public_path('Report/report.docx'));
		// Saving the document as ODF file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
		$objWriter->save('Report/report_odt.odt');
		// Saving the document as HTML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
		$objWriter->save('../resources/views/php_office/report_office.blade.php');

	}
	public function index(){
		$this->text();
		$file= public_path()."/Report/report.docx";
		return response()->download($file);
	}
	public function odt(){
		$this->text();
		$file= public_path()."/Report/report_odt.odt";
		return response()->download($file);
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
		$privacy = DB::table('privacy')->get();
		$y0y = 0;
		foreach ($privacy as $key => $dt) {
			$val15a[$y0y] = $dt->value;
			$y0y++;
		}
		$sum0y = array_sum($val15a);
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
			'privacy' => $privacy,
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
			'sum0y' =>$sum0y,
		];
		$pdf = PDF::loadView('php_office/result', $data)->setPaper('a4');
		return $pdf->stream('Report.pdf');
	}

}

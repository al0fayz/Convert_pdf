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
		$paragraphStyleName = 'pStyle';
		$phpWord->addParagraphStyle($paragraphStyleName, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
		$section = $phpWord->addSection();
		$section->getStyle()->setPageNumberingStart(1); //number page
		$header = array('size' => 14, 'bold' => true);
		$section->addText('Zone file response', $header);
		$paragraf1 = $section->addText("In November we've analyzed 94,020 domains with our crawlers, The results from that crawl are used to generate this report. Not every domain contains a website. This chapter gives insights into the responses of the domains.");
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
		$rows = 10;
		$cols = 10;
		$table = $section->addTable();
		$i = 0;
		foreach ($value as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$per[$i] = round(($val[$i] / $sum) * 100);
			$table->addRow();
			$table->addCell(1750)->addImage("images/sp-{$i}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$table->addCell(1750)->addText("{$name[$i]}");
			$table->addCell(1750)->addText("{$val[$i]}");
			$table->addCell(1750)->addText("{$per[$i]} %");
			$i++;
		}
		$section->addTextBreak(1);
		$section->addText("When we Index a domain there can be four type of response. If a domain name is 'available' it means that we have received a valid response with status code 1xx or 2xx . A domain can also result in a 'host not found' response . This means there is no IP configured in the DNS for this domain . If the response is a 'redirect' then we received a service side redirect with status code 3xx. The last response type is an 'Access denied', this means the crawler could not access the website and recieved status code 4xx, 5xx, or 9xx. The following paragraph gives more details about the cause of the access denied.");
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$denied = $section->addText("Access denied");
		$denied->setFontStyle($fontStyle);
		$section->addText("An 'Access denied' means that the crawler can't access the website. This can occur when the DNS is not configured, the server is unavailable or access is not allowed. in most cases there is no website (DNS is not configured) but sometimes there is, in that case the hosting provider, Webmaster or CMS of the website doesn't allow the crawler to visit the website. if a domain result in an Access denied the 'Status Code' explains why access was denied. In the following chart you can see the top 5 reasons why some domains resulted in an access denied. ");
		$section->addImage('images/span_1.png', array('width' => 480, 'height' => 20, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			// 2. table access
		$table1 = $section->addTable();
		$a = 0;
		foreach ($value1 as $key => $dt) {
			$name[$a] = $dt->name;
			$val[$a] = $dt->value;
			$code[$a] = $dt->code;
			$per[$a] = round(($val[$a] / $sum1) * 100);
			$table->addRow();
			$table->addCell(2000)->addImage("images/sp-{$a}.png", array('width' => 10, 'height' => 10, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
			$table->addCell(2000)->addText("{$code[$a]}");
			$table->addCell(2000)->addText("{$name[$a]}");
			$table->addCell(2000)->addText("{$val[$a]}");
			$table->addCell(2000)->addText("{$per[$a]} %");
			$a++;
		}
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

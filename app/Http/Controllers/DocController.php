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
use PhpOffice\PhpWord\Settings;
use App\Response;
use PDF;

class DocController extends Controller
{
	public function print1(){
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
		$i = 0;
		foreach ($value as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$per[$i] = round(($val[$i] / $sum) * 100);
			$i++;

		}
		$categories = $name;
		$series1 = $per;
		$showGridLines = false;
		$showAxisLabels = false;
		$chart = $section->addChart('doughnut', $categories, $series1);
		$chart->getStyle()->setWidth(Converter::inchToEmu(2.5))->setHeight(Converter::inchToEmu(2));
		$chart->getStyle()->setShowGridX($showGridLines);
		$chart->getStyle()->setShowGridY($showGridLines);
		$chart->getStyle()->setShowAxisLabels($showAxisLabels);

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
		$a = 0;
		foreach ($value1 as $key => $dt) {
			$name[$a] = $dt->name;
			$code[$a] = $dt->code;
			$per[$a] = round(($val[$a] / $sum1) * 100);
		}
		$categories = $name;
		$series1 = array(0);
		$chart = $section->addChart('stacked_bar', $categories, $series1);
		$chart->getStyle()->setWidth(Converter::inchToEmu(7))->setHeight(Converter::inchToEmu(1));
		$chart->getStyle()->setShowGridX(false);
		$chart->getStyle()->setShowGridY(false);
		$chart->getStyle()->setShowAxisLabels(false);
		$a = 0;
		foreach($value1 as $ke => $dt){
			$val[$a] = $dt->value;
			$code[$a] = $dt->code;
			$per[$a] = round(($val[$a] / $sum1) * 100);
			$chart->addSeries($categories, array($per[$a]));
			$a++;
		}
			// 2. table access
		$table1 = $section->addTable();
		$a = 0;
		foreach ($value1 as $key => $dt) {
			$name[$a] = $dt->name;
			$val[$a] = $dt->value;
			$code[$a] = $dt->code;
			$per[$a] = round(($val[$a] / $sum1) * 100);
			$table->addRow();
			$table->addCell(2000)->addText("{$code[$a]}");
			$table->addCell(2000)->addText("{$name[$a]}");
			$table->addCell(2000)->addText("{$val[$a]}");
			$table->addCell(2000)->addText("{$per[$a]} %");
			$a++;
		}
			// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(public_path('Report/page.docx'));
			// \PhpOffice\PhpWord\Settings::setPdfRendererPath('/../vendor/elibyy/tcpdf-laravel');
			// \PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');

		$document = $phpWord->loadTemplate(public_path('Report/page.docx'));
		$document->saveAs(public_path('Report/page.docx'));
			// $phpWord = \PhpOffice\PhpWord\IOFactory::load(public_path('Report/page.docx'));
			// $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'PDF');
			// $xmlWriter->save(public_path('Report/page.pdf'));  // Save to PDF
	}
	public function print(){
		// create a new empty image resource with transparent background
		$img = Image::canvas(800, 600);

// create a new empty image resource with red background
		$img = Image::canvas(32, 32, '#ff0000');
	}

}

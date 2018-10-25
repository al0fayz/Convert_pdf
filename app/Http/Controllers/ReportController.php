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
use TCPDF;
class ReportController extends Controller
{
	public function print(){

	}
	public function chart(){
// New Word document
		echo date('H:i:s'), ' Create new PhpWord object', PHP_EOL;
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
// Define styles
		$phpWord->addTitleStyle(1, array('size' => 14, 'bold' => true), array('keepNext' => true, 'spaceBefore' => 240));
		$phpWord->addTitleStyle(2, array('size' => 14, 'bold' => true), array('keepNext' => true, 'spaceBefore' => 240));
// 2D charts
		$section = $phpWord->addSection();
		$section->addTitle('2D charts', 1);
		$section = $phpWord->addSection(array('colsNum' => 2, 'breakType' => 'continuous'));
		$chartTypes = array('pie', 'doughnut', 'bar', 'column', 'line', 'area', 'scatter', 'radar', 'stacked_bar', 'percent_stacked_bar', 'stacked_column', 'percent_stacked_column');
		$twoSeries = array('bar', 'column', 'line', 'area', 'scatter', 'radar', 'stacked_bar', 'percent_stacked_bar', 'stacked_column', 'percent_stacked_column');
		$threeSeries = array('bar', 'line');
		$categories = array('A', 'B', 'C', 'D', 'E');
		$series1 = array(1, 3, 2, 5, 4);
		$series2 = array(3, 1, 7, 2, 6);
		$series3 = array(8, 3, 2, 5, 4);
		$showGridLines = false;
		$showAxisLabels = false;
		foreach ($chartTypes as $chartType) {
			$section->addTitle(ucfirst($chartType), 2);
			$chart = $section->addChart($chartType, $categories, $series1);
			$chart->getStyle()->setWidth(Converter::inchToEmu(2.5))->setHeight(Converter::inchToEmu(2));
			$chart->getStyle()->setShowGridX($showGridLines);
			$chart->getStyle()->setShowGridY($showGridLines);
			$chart->getStyle()->setShowAxisLabels($showAxisLabels);
			if (in_array($chartType, $twoSeries)) {
				$chart->addSeries($categories, $series2);
			}
			if (in_array($chartType, $threeSeries)) {
				$chart->addSeries($categories, $series3);
			}
			$section->addTextBreak();
		}
		// 3D charts
		$section = $phpWord->addSection(array('breakType' => 'continuous'));
		$section->addTitle('3D charts', 1);
		$section = $phpWord->addSection(array('colsNum' => 2, 'breakType' => 'continuous'));
		$chartTypes = array('pie', 'bar', 'column', 'line', 'area');
		$multiSeries = array('bar', 'column', 'line', 'area');
		$style = array(
			'width'          => Converter::cmToEmu(5),
			'height'         => Converter::cmToEmu(4),
			'3d'             => true,
			'showAxisLabels' => $showAxisLabels,
			'showGridX'      => $showGridLines,
			'showGridY'      => $showGridLines,
		);
		foreach ($chartTypes as $chartType) {
			$section->addTitle(ucfirst($chartType), 2);
			$chart = $section->addChart($chartType, $categories, $series1, $style);
			if (in_array($chartType, $multiSeries)) {
				$chart->addSeries($categories, $series2);
				$chart->addSeries($categories, $series3);
			}
			$section->addTextBreak();
		}
// Save file
		// echo write($phpWord, basename(__FILE__, '.php'), $writers);
		// Saving the document as HTML file...
		// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
		// $objWriter->save('helloWorld.html');
		
		// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(public_path('Report/chart.docx'));
	}
	public function table(){
		// New Word Document
		echo date('H:i:s'), ' Create new PhpWord object', PHP_EOL;
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
		$header = array('size' => 16, 'bold' => true);
// 1. Basic table
		$rows = 10;
		$cols = 5;
		$section->addText('Basic table', $header);
		$table = $section->addTable();
		for ($r = 1; $r <= 8; $r++) {
			$table->addRow();
			for ($c = 1; $c <= 5; $c++) {
				$table->addCell(1750)->addText("Row {$r}, Cell {$c}");
			}
		}
// 2. Advanced table
		$section->addTextBreak(1);
		$section->addText('Fancy table', $header);
		$fancyTableStyleName = 'Fancy Table';
		$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
		$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
		$fancyTableCellStyle = array('valign' => 'center');
		$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
		$fancyTableFontStyle = array('bold' => true);
		$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
		$table = $section->addTable($fancyTableStyleName);
		$table->addRow(900);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 1', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 2', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 3', $fancyTableFontStyle);
		$table->addCell(2000, $fancyTableCellStyle)->addText('Row 4', $fancyTableFontStyle);
		$table->addCell(500, $fancyTableCellBtlrStyle)->addText('Row 5', $fancyTableFontStyle);
		for ($i = 1; $i <= 8; $i++) {
			$table->addRow();
			$table->addCell(2000)->addText("Cell {$i}");
			$table->addCell(2000)->addText("Cell {$i}");
			$table->addCell(2000)->addText("Cell {$i}");
			$table->addCell(2000)->addText("Cell {$i}");
			$text = (0 == $i % 2) ? 'X' : '';
			$table->addCell(500)->addText($text);
		}
/*
 *  3. colspan (gridSpan) and rowspan (vMerge)
 *  ---------------------
 *  |     |   B    |    |
 *  |  A  |--------|  E |
 *  |     | C |  D |    |
 *  ---------------------
 */
$section->addPageBreak();
$section->addText('Table with colspan and rowspan', $header);
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '999999');
$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
$cellVCentered = array('valign' => 'center');
$spanTableStyleName = 'Colspan Rowspan';
$phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
$table = $section->addTable($spanTableStyleName);
$table->addRow();
$cell1 = $table->addCell(2000, $cellRowSpan);
$textrun1 = $cell1->addTextRun($cellHCentered);
$textrun1->addText('A');
$textrun1->addFootnote()->addText('Row span');
$cell2 = $table->addCell(4000, $cellColSpan);
$textrun2 = $cell2->addTextRun($cellHCentered);
$textrun2->addText('B');
$textrun2->addFootnote()->addText('Column span');
$table->addCell(2000, $cellRowSpan)->addText('E', null, $cellHCentered);
$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellVCentered)->addText('C', null, $cellHCentered);
$table->addCell(2000, $cellVCentered)->addText('D', null, $cellHCentered);
$table->addCell(null, $cellRowContinue);
			/*
			 *  4. colspan (gridSpan) and rowspan (vMerge)
			 *  ---------------------
			 *  |     |   B    |  1 |
			 *  |  A  |        |----|
			 *  |     |        |  2 |
			 *  |     |---|----|----|
			 *  |     | C |  D |  3 |
			 *  ---------------------
			 * @see https://github.com/PHPOffice/PHPWord/issues/806
			 */
			$section->addPageBreak();
			$section->addText('Table with colspan and rowspan', $header);
			$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
			$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
			$table = $section->addTable('Colspan Rowspan');
			$row = $table->addRow();
			$row->addCell(1000, array('vMerge' => 'restart'))->addText('A');
			$row->addCell(1000, array('gridSpan' => 2, 'vMerge' => 'restart'))->addText('B');
			$row->addCell(1000)->addText('1');
			$row = $table->addRow();
			$row->addCell(1000, array('vMerge' => 'continue'));
			$row->addCell(1000, array('vMerge' => 'continue', 'gridSpan' => 2));
			$row->addCell(1000)->addText('2');
			$row = $table->addRow();
			$row->addCell(1000, array('vMerge' => 'continue'));
			$row->addCell(1000)->addText('C');
			$row->addCell(1000)->addText('D');
			$row->addCell(1000)->addText('3');
			// 5. Nested table
			$section->addTextBreak(2);
			$section->addText('Nested table in a centered and 50% width table.', $header);
			$table = $section->addTable(array('width' => 50 * 50, 'unit' => 'pct', 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER));
			$cell = $table->addRow()->addCell();
			$cell->addText('This cell contains nested table.');
			$innerCell = $cell->addTable(array('alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER))->addRow()->addCell();
			$innerCell->addText('Inside nested table');
			// 6. Table with floating position
			$section->addTextBreak(2);
			$section->addText('Table with floating positioning.', $header);
			$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '999999', 'position' => array('vertAnchor' => TablePosition::VANCHOR_TEXT, 'bottomFromText' => Converter::cmToTwip(1))));
			$cell = $table->addRow()->addCell();
			$cell->addText('This is a single cell.');
			// Save file
			// Saving the document as OOXML file...
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save(public_path('Report/chart.docx'));

		}
		public function page1(){
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
			\PhpOffice\PhpWord\Settings::setPdfRendererPath('/../vendor/elibyy/tcpdf-laravel');
			\PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');

			$document = $phpWord->loadTemplate(public_path('Report/page.docx'));
			$document->saveAs(public_path('Report/page.docx'));
			$phpWord = \PhpOffice\PhpWord\IOFactory::load(public_path('Report/page.docx'));
			$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'PDF');
			$xmlWriter->save(public_path('Report/page.pdf'));  // Save to PDF
			// unlink($temDoc);
		}
		public function report_doc(){
			return view('admin.report1');
		}
	}

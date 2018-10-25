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
		
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
		$html = '<h2 stle="float: left; ">Zone File Respone</h2>';
		$html .= '<h2 stle="float: right; ">Powered By dataprovider.com</h2>';
		$html .= '<p style="font-size: 12px; text-align: justify;">In November we have analyzed 94,020 domains with our crawlers, The results from that crawl are used to generate this report. Not every domain contains a website. This chapter gives insights into the responses of the domains.</p>';
		$html .= '<h5><b>Respone</b></h5>';

		$html .= '<table style="width: 40%; border:">
		<tr>
		<td>
		<img src="images/cake_res.png" width="200px" height="200px">
		</td>
		</tr>
		</table>';
		$html .= '<table style="width: 40%; border:">
		<tr>
		<td>';
		$html .=
		'<img src="images/cake_res.png" width="200px" height="200px">';
		$html .=
		'</td>
		</tr>
		</table>';

		//save html
		\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
		$objWriter->save('../resources/views/php_office/result.blade.php');
		//save docx
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save('Report/report.docx');

	}
	public function index(){
		$this->text();
		// $pdf = PDF::loadView('php_office/result');
		// return $pdf->download('invoice.pdf');
	}
	
}

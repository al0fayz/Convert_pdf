<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SnappyPdf;
use GuzzleHttp\Client;
use DB;
use mikehaertl\wkhtmlto\Pdf;

class PdfController extends Controller
{
	protected $color = ['#33ccff','#28a745','#ff9933','#cc0066','#cc3300','#ffff00','#0000ff',];
    public function index(){
  //   	$value = DB::table('response')->get();
		// $i = 0;
		// foreach ($value as $key => $dt) {
		// 	$name[$i] = $dt->name;
		// 	$val[$i] = $dt->value;
		// 	$i++;
		// }
		// $a = 0;
		// $sum = array_sum($val);
		// foreach ($val as $key => $v) {
		// 	$per[$a] = round(($v / $sum) * 100);
		// 	$a++;
		// }
  //      	//data table access
		// $access = DB::table('access')->get();
		// $b = 0;
		// foreach ($access as $key => $dl) {
		// 	$nm[$b] = $dl->name;
		// 	$vl[$b] = $dl->value;
		// 	$code[$b] = $dl->code;
		// 	$b++;
		// }
		// $c = 0;
		// $sm = array_sum($vl);
		// foreach ($vl as $key => $v) {
		// 	$p[$c] = round(($v / $sm) * 100);
		// 	$c++;
		// }
  //      	//generate to pdf
		// $data = [
		// 	'sum' => $sum,
		// 	'sm' =>$sm,
		// 	'data' => $value,
		// 	'access' => $access,
		// ];
    	$pdf = SnappyPdf::loadView('result');
		return $pdf->download('result.pdf');
		// exec('"C:/Program Files/wkhtmltopdf/wkhtmltopdf.exe" https://google.com D:/pdf.pdf');
    }
    public function print(){
    	$value = DB::table('response')->get();
		$i = 0;
		foreach ($value as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$i++;
		}
		$a = 0;
		$sum = array_sum($val);
		foreach ($val as $key => $v) {
			$per[$a] = round(($v / $sum) * 100);
			$a++;
		}
       	//data table access
		$access = DB::table('access')->get();
		$b = 0;
		foreach ($access as $key => $dl) {
			$nm[$b] = $dl->name;
			$vl[$b] = $dl->value;
			$code[$b] = $dl->code;
			$b++;
		}
		$c = 0;
		$sm = array_sum($vl);
		foreach ($vl as $key => $v) {
			$p[$c] = round(($v / $sm) * 100);
			$c++;
		}
		//page 2
		$value = DB::table('developed')->get();
		$i = 0;
		foreach ($value as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$i++;
		}
		$a = 0;
		$sum = array_sum($val);
		foreach ($val as $key => $v) {
			$per[$a] = round(($v / $sum) * 100);
			$a++;
		}
		$path = public_path('images/developed.png');
		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		// Read bytes off of the stream until the end of the stream is reached
		$res = $client->request('GET', '/chart/pie', ['json' => [
			'data' => $per,
			'color' => $this->color,
			'labels' => $name
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());

       	//data table access
		$un = DB::table('undeveloped')->get();
		$b = 0;
		foreach ($un as $key => $dl) {
			$nm[$b] = $dl->name;
			$vl[$b] = $dl->value;
			$b++;
		}
		$c = 0;
		$sm = array_sum($vl);
		foreach ($vl as $key => $v) {
			$p[$c] = round(($v / $sm) * 100);
			$c++;
		}
		$response = $client->request('GET', '/chart/pie', ['json' => [
			'data' => $p,
			'color' => $this->color,
			'labels' => $nm
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
       	//generate to pdf

       	//page3
       	$value = DB::table('website')->get();
		$i = 0;
		foreach ($value as $key => $dt) {
			$name[$i] = $dt->website;
			$val[$i] = $dt->value;
			$i++;
		}
		$a = 0;
		$sum = array_sum($val);
		foreach ($val as $key => $v) {
			$per[$a] = round(($v / $sum) * 100);
			$a++;
		}
		$path = public_path('images/website.png');
		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		// Read bytes off of the stream until the end of the stream is reached
		$res = $client->request('GET', '/chart/bar', ['json' => [
			'data' => $per,
			'color' => $color,
			'labels' => $name
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
		$registrars = DB::table('registrars')->get();
		$i = 0;
		foreach ($registrars as $key => $dt) {
			$hosting[$i] = $dt->hosting;
			$domain[$i] = $dt->domains;
			$available[$i] = $dt->available;
			$develop[$i] = $dt->developed;
			$i++;
		}
		//page4
		$value = DB::table('heartbeat')->get();
		$i = 0;
		foreach ($value as $key => $dt) {
			$name[$i] = $dt->pulse_name;
			$val[$i] = $dt->value;
			$i++;
		}
		$a = 0;
		$sum = array_sum($val);
		foreach ($val as $key => $v) {
			$per[$a] = round(($v / $sum) * 100);
			$a++;
		}
		$path = public_path('images/pulse.png');
		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		// Read bytes off of the stream until the end of the stream is reached
		$res = $client->request('GET', '/chart/pie', ['json' => [
			'data' => $per,
			'color' => $color,
			'labels' => $name
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
		$registrars = DB::table('registrars')->get();
		$i = 0;
		foreach ($registrars as $key => $dt) {
			$hosting[$i] = $dt->hosting;
			$domain[$i] = $dt->domains;
			$available[$i] = $dt->available;
			$develop[$i] = $dt->developed;
			$i++;
		}

    }
    public function pdf(){
    	$binary = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"';
    }
}

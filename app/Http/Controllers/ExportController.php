<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Response;
use DB;
use PDF;
class ExportController extends Controller
{
	protected $color = ['#33ccff','#28a745','#ff9933','#cc0066','#cc3300','#ffff00','#0000ff',];
	
	public function pdf1(){
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
		$path = public_path('images/response.png');
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
       	//generate to pdf
		$data = [
			'sum' => $sum,
			'sm' =>$sm,
			'data' => $value,
			'access' => $access,
		];
		$pdf = PDF::loadView('admin.pdf.pdf1', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf1.pdf');
		file_put_contents ($p , $pdf->download('pdf1.pdf'));
		return $pdf->stream();
	}
	public function pdf2(){
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
		$data = [
			'sum' => $sum,
			'sm' => $sm,
			'dev' => $value,
			'un' => $un,
		];
		$pdf = PDF::loadView('admin.pdf.pdf2', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf2.pdf');
		file_put_contents ($p , $pdf->download('pdf2.pdf'));
		return $pdf->stream();
	}
	public function pdf3(){
		$color = [
			'#33ccff',
            '#28a745',
            '#ff9933',
            '#cc0066',
            '#cc3300',
            '#ffff00',
            '#0000ff',
		];
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
		$data = [
			'name' => $name,
			'value' => $val,
			'percent' => $per,
			'hosting' => $hosting,
			'available' => $available,
			'develop' => $develop,
			'data' => DB::table('website')->get(),
			'regis' => DB::table('registrars')->get(),
		];
		$pdf = PDF::loadView('admin.pdf.pdf3', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf3.pdf');
		file_put_contents ($p , $pdf->download('pdf3.pdf'));
		return $pdf->stream();
	}
	public function pdf4(){
		$color = [
			'#33ccff',
            '#28a745',
            '#ff9933',
            '#cc0066',
            '#cc3300',
            '#ffff00',
            '#0000ff',
		];
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
		$data = [
			'name' => $name,
			'value' => $val,
			'percent' => $per,
			'data' => DB::table('heartbeat')->get(),
			'regis' => DB::table('registrars')->get(),
		];
		$pdf = PDF::loadView('admin.pdf.pdf4', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf4.pdf');
		file_put_contents ($p , $pdf->download('pdf3.pdf'));
		return $pdf->stream();
	}
	public function pdf5(){
		$color = [
			'#33ccff',
            '#28a745',
            '#ff9933',
            '#cc0066',
            '#cc3300',
            '#ffff00',
            '#0000ff',
		];
		$value = DB::table('probability')->get();
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
		$path = public_path('images/probability.png');
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
		$data = [
			'name' => $name,
			'value' => $val,
			'percent' => $per,
			'data' => DB::table('probability')->get(),
			'regis' => DB::table('registrars')->get(),
		];
		$pdf = PDF::loadView('admin.pdf.pdf5', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf5.pdf');
		file_put_contents ($p , $pdf->download('pdf5.pdf'));
		return $pdf->stream();
	}
	public function pdf6(){
		$company = DB::table('hosting_company')->get();
		$country = DB::table('hosting_country')->get();
		$i = 0;
		foreach ($country as $key => $dt) {
			$val[$i] = $dt->value;
			$i++;
		}
		$sum = array_sum($val);
		$data = [
			'sum' => $sum,
			'company' => $company,
			'country' => $country,
		];
		$pdf = PDF::loadView('admin.pdf.pdf6', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf6.pdf');
		file_put_contents ($p , $pdf->download('pdf6.pdf'));
		return $pdf->stream();
	}
	public function pdf7(){
		$dis = DB::table('distribution')->get();
		$i = 0;
		foreach ($dis as $key => $dt) {
			$val[$i] = $dt->value;
			$name[$i] = $dt->name;
			$i++;
		}
		$sum = array_sum($val);
		$a =0;
		foreach ($val as $key => $v) {
			$per[$a] = round(($v / $sum) * 100);
			$a++;
		}
		$path = public_path('images/distribution.png');
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

		$sub = DB::table('subdomain')->get();
		$v = 0;
		foreach ($sub as $key => $dt) {
			$vl[$v] = $dt->value;
			$v++;
		}
		$s = array_sum($vl);
		$data = [
			'dis' => $dis,
			'sub' => $sub,
			'sum' => $sum,
			's' => $s,
		];
		$pdf = PDF::loadView('admin.pdf.pdf7', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf7.pdf');
		file_put_contents ($p , $pdf->download('pdf7.pdf'));
		return $pdf->stream();
	}
	public function pdf8(){
		$dns = DB::table('dns')->get();
		$i = 0;
		foreach ($dns as $key => $dt) {
			$val[$i] = $dt->value;
			$name[$i] = $dt->name;
			$i++;
		}
		$sum = array_sum($val);
		$a =0;
		foreach ($val as $key => $v) {
			$per[$a] = round(($v / $sum) * 100);
			$a++;
		}
		$path = public_path('images/dns.png');
		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		// Read bytes off of the stream until the end of the stream is reached
		$res = $client->request('GET', '/chart/bar', ['json' => [
			'data' => $per,
			'color' => $this->color,
			'labels' => $name
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
		$dns_txt = DB::table('dns_txt')->get();
		$z = 0;
		foreach ($dns_txt as $key => $dt) {
			$vl[$z] = $dt->value;
			$name[$z] = $dt->name;
			$z++;
		}
		$sm = array_sum($vl);
		$mx_domains = DB::table('mx_domains')->get();
		$o = 0;
		foreach ($dns_txt as $key => $dt) {
			$va[$o] = $dt->value;
			$name[$o] = $dt->name;
			$z++;
		}
		$s = array_sum($va);
		$data = [
			'dns' => $dns,
			'dns_txt' => $dns_txt,
			'mx_domains' => $mx_domains,
			's' => $s,
			'sum' =>$sum,
			'sm' =>$sm,
		];
		$pdf = PDF::loadView('admin.pdf.pdf8', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf8.pdf');
		file_put_contents ($p , $pdf->download('pdf8.pdf'));
		return $pdf->stream();
	}
	public function pdf9(){
		$dns_ns = DB::table('dns_ns')->get();
		$i = 0;
		foreach ($dns_ns as $key => $dt) {
			$val[$i] = $dt->value;
			$i++;
		}
		$sum = array_sum($val);
		$data = [
			'sum' => $sum,
			'dns_ns' => $dns_ns,
		];
		$pdf = PDF::loadView('admin.pdf.pdf9', $data)->setPaper('a4', 'potrait');
		$p = public_path('Report/pdf9.pdf');
		file_put_contents ($p , $pdf->download('pdf9.pdf'));
		return $pdf->stream();
	}
	public function merge(){
		$path = public_path('Report/result.pdf');
		$data = ['Report/pdf1.pdf','Report/pdf2.pdf'
		];
		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		// Read bytes off of the stream until the end of the stream is reached
		$res = $client->request('GET', '/merge', ['json' => [
			'data' => $data
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
	}
}

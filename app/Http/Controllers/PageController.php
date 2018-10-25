<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use GuzzleHttp\Client;
class PageController extends Controller
{
	protected $color = ['#33ccff','#28a745','#ff9933','#cc0066','#cc3300','#ffff00','#0000ff','#ff0000','#660066','#999966'];

	private function chartjs1(){
		$response = DB::table('response')->get();
		$a = 0;
		foreach ($response as $key => $dt) {
			$val1[$a] = $dt->value;
			$name1[$a] = $dt->name;
			$a++;
		}
		$sum1 = array_sum($val1);
		$i=0;
		foreach ($val1 as $key => $v) {
			$per[$i] = round(($v / $sum1) * 100);
			$i++;
		}
		$chartjs = app()->chartjs
		->name('pieChartTest')
		->type('doughnut')
		->labels($name1)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs;
	}
	private function chartjs2(){
		$developed = DB::table('developed')->get();
		$c = 0;
		foreach ($developed as $key => $val) {
			$val3[$c] = $val->value;
			$name[$c] = $val->name;
			$c++;
		}
		$sum3 = array_sum($val3);
		$i=0;
		foreach ($val3 as $key => $v) {
			$per[$i] = round(($v / $sum3) * 100);
			$i++;
		}
		$chartjs2 = app()->chartjs
		->name('piec')
		->type('doughnut')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs2;
	}
	private function chartjs3(){
		$undeveloped = DB::table('undeveloped')->get();
		$d = 0;
		foreach ($undeveloped as $key => $dl) {
			$val4[$d] = $dl->value;
			$name[$d] = $dl->name;
			$d++;
		}
		$sum4 = array_sum($val4);
		$i=0;
		foreach ($val4 as $key => $v) {
			$per[$i] = round(($v / $sum4) * 100);
			$i++;
		}
		$chartjs2 = app()->chartjs
		->name('undeveloped')
		->type('doughnut')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs2;
	}
	private function chartjs4(){
		$heartbeat = DB::table('heartbeat')->get();
		$g = 0;
		foreach ($heartbeat as $key => $dt) {
			$val6[$g] = $dt->value;
			$name[$g] = $dt->pulse_name;
			$g++;
		}
		$sum6 = array_sum($val6);
		$i=0;
		foreach ($val6 as $key => $v) {
			$per[$i] = round(($v / $sum6) * 100);
			$i++;
		}
		$chartjs2 = app()->chartjs
		->name('pulse')
		->type('doughnut')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs2;
	}
	private function chartjs5(){
		$probability = DB::table('probability')->get();
		$h = 0;
		foreach ($probability as $key => $dt) {
			$val7[$h] = $dt->value;
			$name[$h] = $dt->name;
			$h++;
		}
		$sum7 = array_sum($val7);
		$i=0;
		foreach ($val7 as $key => $v) {
			$per[$i] = round(($v / $sum7) * 100);
			$i++;
		}
		$chartjs2 = app()->chartjs
		->name('renewal')
		->type('doughnut')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs2;
	}
	private function chartjs6(){
		$dis = DB::table('distribution')->get();
		$j = 0;
		foreach ($dis as $key => $dt) {
			$val9[$j] = $dt->value;
			$name[$j] = $dt->name;
			$j++;
		}
		$sum9 = array_sum($val9);
		$i=0;
		foreach ($val9 as $key => $v) {
			$per[$i] = round(($v / $sum9) * 100);
			$i++;
		}
		$chartjs2 = app()->chartjs
		->name('distribution')
		->type('doughnut')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs2;
	}
	private function chartjs7(){
		$chartjs2 = app()->chartjs
		->name('privacy')
		->type('doughnut')
		->labels(['Yes', 'No'])
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => [1,99]
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs2;
	}
	private function chartjs8(){
		$ssl = DB::table('ssl_type')->get();
		$j = 0;
		foreach ($ssl as $key => $dt) {
			$val9[$j] = $dt->value;
			$name[$j] = $dt->name;
			$j++;
		}
		$sum9 = array_sum($val9);
		$i=0;
		foreach ($val9 as $key => $v) {
			$per[$i] = round(($v / $sum9) * 100);
			$i++;
		}
		$chartjs2 = app()->chartjs
		->name('ssl')
		->type('doughnut')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'hoverBackgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			animation: false,
		}");
		return $chartjs2;
	}
	private function bar1(){
		$website = DB::table('website')->get();
		$e = 0;
		foreach ($website as $key => $dt) {
			$val5[$e] = $dt->value;
			$name[$e] = $dt->website;
			$e++;
		}
		$sum5 = array_sum($val5);
		$i=0;
		foreach ($val5 as $key => $v) {
			$per[$i] = round(($v / $sum5) * 100);
			$i++;
		}
		$chartjs = app()->chartjs
		->name('barRedirect')
		->type('bar')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			scales: {
				xAxes: [{
					gridLines: {
						display:false
					}
				}],
				yAxes: [{
					gridLines: {
						display:false
					}   
				}]
			},
			animation: false,
		}");
		return $chartjs;
	}
	private function bar2(){
		$dns = DB::table('dns')->get();
		$l = 0;
		foreach ($dns as $key => $dt) {
			$val11[$l] = $dt->value;
			$name[$l] = $dt->name;
			$l++;
		}
		$sum11 = array_sum($val11);
		$i=0;
		foreach ($val11 as $key => $v) {
			$per[$i] = round(($v / $sum11) * 100);
			$i++;
		}
		$chartjs = app()->chartjs
		->name('dnsType')
		->type('bar')
		->labels($name)
		->datasets([
			[
				'backgroundColor' => $this->color,
				'data' => $per
			]
		])
		->optionsRaw("{
			legend: {
				display:false
			},
			responsive: false,
			scales: {
				xAxes: [{
					gridLines: {
						display:false
					}
				}],
				yAxes: [{
					gridLines: {
						display:false
					}   
				}]
			},
			animation: false,
		}");
		return $chartjs;
	}
	private function image_response(){
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
	}
	private function image_dev(){
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
	}
	private function image_undev(){
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
		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		$res = $client->request('GET', '/chart/pie', ['json' => [
			'data' => $p,
			'color' => $this->color,
			'labels' => $nm
		]]);
		$path = public_path('images/undeveloped.png');
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
	}
	private function image_pulse(){
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
			'color' => $this->color,
			'labels' => $name
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
	}
	private function image_prob(){
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
		$path = public_path('images/prob.png');
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
	}
	private function image_distribution(){
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
	}
	private function image_whois(){
		$path = public_path('images/whois.png');
		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		// Read bytes off of the stream until the end of the stream is reached
		$res = $client->request('GET', '/chart/pie', ['json' => [
			'data' => [1, 99],
			'color' => $this->color,
			'labels' => ['Yes', 'No']
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
	}
	private function image_ssl(){
		$ssl = DB::table('ssl_type')->get();
		$p = 0;
		foreach ($ssl as $key => $dt) {
			$val15[$p] = $dt->value;
			$name[$p] = $dt->name;
			$p++;
		}
		$sum15 = array_sum($val15);
		$a =0;
		foreach ($val15 as $key => $v) {
			$per[$a] = round(($v / $sum15) * 100);
			$a++;
		}
		$path = public_path('images/ssl.png');
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

	}
	private function image_language(){
		$language = DB::table('language')->get();
		$p = 0;
		foreach ($language as $key => $dt) {
			$val15[$p] = $dt->value;
			$name[$p] = $dt->name;
			$p++;
		}
		$sum15 = array_sum($val15);
		$a =0;
		foreach ($val15 as $key => $v) {
			$per[$a] = round(($v / $sum15) * 100);
			$a++;
		}
		$path = public_path('images/language.png');
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

	}
	public function image_bar(){
		$website = DB::table('website')->get();
		$i = 0;
		foreach ($website as $key => $dt) {
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
			'color' => $this->color,
			'labels' => $name
		]]);
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
        // echo($data);
		file_put_contents ($path , $res->getBody());
	}
	public function image_bar1(){
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
	}
	public function image_bar2(){
		$countries = DB::table('countries')->get();
		$i = 0;
		foreach ($countries as $key => $dt) {
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
		$path = public_path('images/countries.png');
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
	}
	public function image_bar3(){
		$social_media = DB::table('social_media')->get();
		$i = 0;
		foreach ($social_media as $key => $dt) {
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
		$path = public_path('images/social_media.png');
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
	}
	public function all(){
		//page1
		$this->image_response();
		$this->image_dev();
		$this->image_undev();
		$this->image_pulse();
		$this->image_prob();
		$this->image_distribution();
		$this->image_whois();
		$this->image_ssl();
		$this->image_language();
		$this->image_bar();
		$this->image_bar1();
		$this->image_bar2();
		$this->image_bar3();

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
			'value1' => json_encode($value1,JSON_NUMERIC_CHECK),
			'val2' => json_encode($val1,JSON_NUMERIC_CHECK),
			'val3' => json_encode($val1,JSON_NUMERIC_CHECK),
			'val4' => json_encode($val1,JSON_NUMERIC_CHECK),
			'sum_active' => $sum_active,
			'sum_not' => $sum_not,
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
			'chartjs1' => $this->chartjs1(),
			'chartjs2' => $this->chartjs2(),
			'chartjs3' => $this->chartjs3(),
			'chartjs4' => $this->chartjs4(),
			'chartjs5' => $this->chartjs5(),
			'chartjs6' => $this->chartjs6(),
			'chartjs7' => $this->chartjs7(),
			'chartjs8' => $this->chartjs8(),
			'bar1' => $this->bar1(),
			'bar2' => $this->bar2(),
		];
		// dd($data);
		return view('result', $data);
	}
	public function page_1(){
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
		$data = [
			'response' => $response,
			'access' => $access,
			'sum1' => $sum1,
			'sum2' => $sum1,
			'chartjs1' => $this->chartjs1(),
		];
		// dd($data);
		return view('admin.page1', $data);
	}
	public function page2(){
		$data =[
			'chartjs2' => $this->chartjs2(),
			'chartjs3' => $this->chartjs3(),
		];
		return view('admin.page2', $data);
	}
	public function page3(){
		return view('admin.page3');
	}
	public function page4(){
		return view('admin.page4');
	}
	public function page5(){
		return view('admin.page5');
	}
	public function page6(){
		return view('admin.page6');
	}
	public function page7(){
		$dis = DB::table('distribution')->get();
		$sub = DB::table('subdomain')->get();
		$i = 0;
		foreach ($sub as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$i++;
		}
		$sum = array_sum($val);
		$data = [
			'dis' => $dis,
			'sub' => $sub,
			'sum' => $sum,
		];
		// dd($data);
		return view('admin.page7', $data);
	}
	public function page8(){
		return view('admin.page8');
	}
	public function page9(){
		$dns_ns = DB::table('dns_ns')->get();
		$i = 0;
		foreach ($dns_ns as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$i++;
		}
		$sum = array_sum($val);
		$data = [
			'dns_ns' => $dns_ns,
			'sum' => $sum,
		];
		return view('admin.page9', $data);
	}
	public function page10(){
		$complet = DB::table('completeness')->get();
		$data = [
			'complet' => $complet,
		];
		return view('admin.page10', $data);
	}
	public function page11(){
		$ssl = DB::table('ssl_type')->get();
		$i = 0;
		foreach ($ssl as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$i++;
		}
		$sum = array_sum($val);
		$data = [
			'ssl' => $ssl,
			'sum' => $sum,
		];
		return view('admin.page11', $data);
	}
	public function page12(){
		$issue = DB::table('ssl_issue')->get();
		$i = 0;
		foreach ($issue as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$i++;
		}
		$sum = array_sum($val);
		$data = [
			'issue' => $issue,
			'sum' => $sum,
		];
		return view('admin.page12', $data);
	}
	public function page13(){
		$issue = DB::table('ssl_issue')->get();
		$i = 0;
		foreach ($issue as $key => $dt) {
			$name[$i] = $dt->name;
			$val[$i] = $dt->value;
			$i++;
		}
		$sum = array_sum($val);
		$data = [
			'issue' => $issue,
			'sum' => $sum,
		];
		return view('admin.page13');
	}
	public function print(){

		$client = new Client(['base_uri' => 'http://127.0.0.1:8008']);
		// Read bytes off of the stream until the end of the stream is reached
		$res = $client->request('GET', '/pdf');
		$status_code = $res->getStatusCode();
		$data = $res->getBody();
		$file= public_path()."/Report/report_2018.pdf";
		return response()->download($file);
		
	}
	public function report(){
		$file= public_path()."/Report/report_2018.pdf";
		return response()->download($file);
	}
	public function data(){
		$response = DB::table('response')
                    ->get();
        return response()->json($response);
	}
}

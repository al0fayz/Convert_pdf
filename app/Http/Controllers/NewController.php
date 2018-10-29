<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;
use CpChart\Chart\Pie;
use CpChart\Data;
use CpChart\Image;
use CpChart\Chart\Indicator;
use DB;

class NewController extends Controller
{ 
    public function index(){
        $this->image_1();
        $this->image_2();
        $this->image_3();
        $this->image_4();
        $this->image_5();
        $this->image_6();
        $this->image_7();
        $this->image_8();
        $this->image_9();
        $this->span_1();
        $this->span_2();
        $this->span_3();
        $this->span_4();
        $this->span_5();
        $this->span_6();
        $this->span_7();
        $this->span_8();
        $this->span_9();
        $this->span_10();
        $this->span_11();
        $this->span_12();
        $this->span_13();
        $this->bar_1();
        $this->bar_2();
        $this->bar_3();
        $this->bar_4();
        $this->img_table1();
        $this->img_table2();
        $this->img_table3();
        $this->img_table4();
        $this->img_table5();
        $this->img_table6();
        return view('admin.dashboard');
       
    }
    private function image_1(){
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
    //doughnut
    $data = new Data();
    $data->addPoints($per, "value");

    $data->addPoints($name1, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_res.png");
}

private function image_2(){
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
        //doughnut
    $data = new Data();
    $data->addPoints($per, "value");

    $data->addPoints($name, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_dev.png");

} 
private function image_3(){
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
        //doughnut
    $data = new Data();
    $data->addPoints($per, "value");
    
    $data->addPoints($name, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_un.png");
}
private function image_4(){
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
        //doughnut
    $data = new Data();
    $data->addPoints($per, "value");
    
    $data->addPoints($name, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_heart.png");
}
private function image_5(){
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
        //doughnut
    $data = new Data();
    $data->addPoints($per, "value");
    
    $data->addPoints($name, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_prob.png");
}
private function image_6(){
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
        //doughnut
    $data = new Data();
    $data->addPoints($per, "value");
    
    $data->addPoints($name, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_dis.png");
}
private function image_7(){
        //doughnut
    $data = new Data();
    $data->addPoints([1,99], "value");
    
    $data->addPoints(["Yes", "No"], "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_priv.png");
}
private function image_8(){
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
        //doughnut
    $data = new Data();
    $data->addPoints($per, "value");
    
    $data->addPoints($name, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_ssl.png");
}
private function image_9(){
    $language = DB::table('language')->get();
    $r = 0;
    foreach ($language as $key => $dt) {
        $name[$r] = $dt->name;
        $val17[$r] = $dt->value;
        $r++;
    }
    $sum17 = array_sum($val17);
    $i=0;
    foreach ($val17 as $key => $v) {
        $per[$i] = round(($v / $sum17) * 100);
        $i++;
    }
        //doughnut
    $data = new Data();
    $data->addPoints($per, "value");
    
    $data->addPoints($name, "Labels");
    $data->setAbscissa("Labels");

    $image = new Image(180, 180, $data);
    $pieChart = new Pie($image, $data);
    $pieChart->draw2DRing(90, 90, ["DrawLabels" => false, "LabelStacked" => false, "Border" => false]);
    $image->Render("images/cake_lang.png");
}
private function span_1(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $ssl = DB::table('access')->get();
    $j = 0;
    foreach ($ssl as $key => $dt) {
        $val[$j] = $dt->value;
        $j++;
    }

    $sum = array_sum($val);
    $a =0;
    $b =0;
    $c = 0;
    $d = 1;
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum)*1000);
        $per1[$d] = round(($v / $sum)*1000);
        $c += $per1[$d];
        imagefilledrectangle($im, $b, 0, $c, 40, $Palette[$a]);
        $b +=$per[$a];
        $c += $per1[$d];
        $a++;
        $d++;
    }
    // dd($b, $per);
    // Save the image
    imagepng($im, './images/span_1.png');
    imagedestroy($im);
}
private function span_2(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $dev = DB::table('developed')->get();
    $j = 0;
    foreach ($dev as $key => $dt) {
        $val[$j] = $dt->value;
        $j++;
    }

    $sum1 = array_sum($val);
    $un = DB::table('undeveloped')->get();
    $j = 0;
    foreach ($un as $key => $dt) {
        $val[$j] = $dt->value;
        $j++;
    }

    $sum2 = array_sum($val);
    $tot = $sum1 + $sum2;
    $per_dev = round(($sum1 / $tot) *1000);
    $per_un = round(($sum2 / $tot) *1000);
    $w = $per_dev + $per_un;
    imagefilledrectangle($im, 0, 0, $per_dev, 40, $Palette[0]);
    imagefilledrectangle($im, $per_dev, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_2.png');
    imagedestroy($im);
}
private function span_3(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $val = [76, 24];
    $sum = array_sum($val);
    $per_y = round(($val[0] / $sum) *1000);
    $per_n = round(($val[1] / $sum) *1000);
    $w = $per_y + $per_n;
    imagefilledrectangle($im, 0, 0, $per_y, 40, $Palette[0]);
    imagefilledrectangle($im, $per_y, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_3.png');
    imagedestroy($im);
}
private function span_4(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $ssl = DB::table('hosting_country')->get();
    $j = 0;
    foreach ($ssl as $key => $dt) {
        $val[$j] = $dt->value;
        $j++;
    }

    $sum = array_sum($val);
    $a =0;
    $b =0;
    $c = 0;
    $d = 1;
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum)*1000);
        $per1[$d] = round(($v / $sum)*1000);
        $c += $per1[$d];
        imagefilledrectangle($im, $b, 0, $c, 40, $Palette[$a]);
        $b +=$per[$a];
        $c += $per1[$d];
        $a++;
        $d++;
    }
    // Save the image
    imagepng($im, './images/span_4.png');
    imagedestroy($im);
}
private function span_5(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $val = [79, 21];
    $sum = array_sum($val);
    $per_y = round(($val[0] / $sum) *1000);
    $per_n = round(($val[1] / $sum) *1000);
    $w = $per_y + $per_n;
    imagefilledrectangle($im, 0, 0, $per_y, 40, $Palette[0]);
    imagefilledrectangle($im, $per_y, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_5.png');
    imagedestroy($im);
}
private function span_6(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $ssl = DB::table('dns_txt')->get();
    $j = 0;
    foreach ($ssl as $key => $dt) {
        $val[$j] = $dt->value;
        $j++;
    }

    $sum = array_sum($val);
    $a =0;
    $b =0;
    $c = 0;
    $d = 1;
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum)*1000);
        $per1[$d] = round(($v / $sum)*1000);
        $c += $per1[$d];
        imagefilledrectangle($im, $b, 0, $c, 40, $Palette[$a]);
        $b +=$per[$a];
        $c += $per1[$d];
        $a++;
        $d++;
    }
    // Save the image
    imagepng($im, './images/span_6.png');
    imagedestroy($im);
}
private function span_7(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $val = [6, 94];
    $sum = array_sum($val);
    $per_y = round(($val[0] / $sum) *1000);
    $per_n = round(($val[1] / $sum) *1000);
    $w = $per_y + $per_n;
    imagefilledrectangle($im, 0, 0, $per_y, 40, $Palette[0]);
    imagefilledrectangle($im, $per_y, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_7.png');
    imagedestroy($im);
}
private function span_8(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $val = [97, 3];
    $sum = array_sum($val);
    $per_y = round(($val[0] / $sum) *1000);
    $per_n = round(($val[1] / $sum) *1000);
    $w = $per_y + $per_n;
    imagefilledrectangle($im, 0, 0, $per_y, 40, $Palette[0]);
    imagefilledrectangle($im, $per_y, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_8.png');
    imagedestroy($im);
}
private function span_9(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $val = [56, 44];
    $sum = array_sum($val);
    $per_y = round(($val[0] / $sum) *1000);
    $per_n = round(($val[1] / $sum) *1000);
    $w = $per_y + $per_n;
    imagefilledrectangle($im, 0, 0, $per_y, 40, $Palette[0]);
    imagefilledrectangle($im, $per_y, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_9.png');
    imagedestroy($im);
}
private function span_10(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $val = [79, 21];
    $sum = array_sum($val);
    $per_y = round(($val[0] / $sum) *1000);
    $per_n = round(($val[1] / $sum) *1000);
    $w = $per_y + $per_n;
    imagefilledrectangle($im, 0, 0, $per_y, 40, $Palette[0]);
    imagefilledrectangle($im, $per_y, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_10.png');
    imagedestroy($im);
}
private function span_11(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $ssl = DB::table('pages_website')->get();
    $j = 0;
    foreach ($ssl as $key => $dt) {
        $val[$j] = $dt->value;
        $j++;
    }

    $sum = array_sum($val);
    $a =0;
    $b =0;
    $c = 0;
    $d = 1;
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum)*1000);
        $per1[$d] = round(($v / $sum)*1000);
        $c += $per1[$d];
        imagefilledrectangle($im, $b, 0, $c, 40, $Palette[$a]);
        $b +=$per[$a];
        $c += $per1[$d];
        $a++;
        $d++;
    }
    // Save the image
    imagepng($im, './images/span_11.png');
    imagedestroy($im);
}
private function span_12(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $val = [40, 60];
    $sum = array_sum($val);
    $per_y = round(($val[0] / $sum) *1000);
    $per_n = round(($val[1] / $sum) *1000);
    $w = $per_y + $per_n;
    imagefilledrectangle($im, 0, 0, $per_y, 40, $Palette[0]);
    imagefilledrectangle($im, $per_y, 0, $w, 40, $Palette[1]);
    
    // Save the image
    imagepng($im, './images/span_12.png');
    imagedestroy($im);
}
private function span_13(){
    $im = imagecreatetruecolor(1000, 40);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $ssl = DB::table('social_media_type')->get();
    $j = 0;
    foreach ($ssl as $key => $dt) {
        $val[$j] = $dt->value;
        $j++;
    }

    $sum = array_sum($val);
    $a =0;
    $b =0;
    $c = 0;
    $d = 1;
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum)*1000);
        $per1[$d] = round(($v / $sum)*1000);
        $c += $per1[$d];
        imagefilledrectangle($im, $b, 0, $c, 40, $Palette[$a]);
        $b +=$per[$a];
        $c += $per1[$d];
        $a++;
        $d++;
    }
    // Save the image
    imagepng($im, './images/span_13.png');
    imagedestroy($im);
}
private function bar_1(){
    $im = imagecreatetruecolor(400, 400);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    $website = DB::table('website')->get();
    $count = DB::table('website')->select('value')->count();
    $i = 0;
    foreach ($website as $key => $dt) {
        $name[$i] = $dt->website;
        $val[$i] = $dt->value;
        $i++;
    }
    if($count >= 10){
        $devided = (400 / $count)-10;
    }else{
        $devided = (400 / 10)-10;
    }
    $a = 0;
    $b = 0;
    $c = $devided;

    $sum = array_sum($val);
    imagefilledrectangle($im, 0, 0, 400, 400, $white);
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum) * 400);
        $nil[$a] = (400 - $per[$a]) -5;
        imagefilledrectangle($im, $b, 400, $c, $nil[$a], $Palette[$a]);
        $b += $devided;
        $c += $devided;
        $c += 10;
        $b += 10;
        $a++;
    }
        // dd($nil);
         // imagefilledrectangle($im, 0, 400, 60, 100, $Palette[0]);
         // imagefilledrectangle($im, 70, 400, 130, 200, $Palette[1]);
         // imagefilledrectangle($im, 140, 400, 210, 200, $Palette[2]);
         // imagefilledrectangle($im, 220, 400, 290, 80, $Palette[3]);
    imagefilledrectangle($im, 0, 395, 400, 400, $black);


    // Save the image
    imagepng($im, './images/bar_1.png');
    imagedestroy($im);
}
private function bar_2(){
    $im = imagecreatetruecolor(400, 400);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    $website = DB::table('dns')->get();
    $count = DB::table('dns')->select('value')->count();
    $i = 0;
    foreach ($website as $key => $dt) {
        $val[$i] = $dt->value;
        $i++;
    }
    if($count >= 10){
        $devided = (400 / $count)-10;
    }else{
        $devided = (400 / 10)-10;
    }
    $a = 0;
    $b = 0;
    $c = $devided;

    $sum = array_sum($val);
    imagefilledrectangle($im, 0, 0, 400, 400, $white);
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum) * 400);
        $nil[$a] = (400 - $per[$a]) -5;
        imagefilledrectangle($im, $b, 400, $c, $nil[$a], $Palette[$a]);
        $b += $devided;
        $c += $devided;
        $c += 10;
        $b += 10;
        $a++;
    }
        // dd($nil);
         // imagefilledrectangle($im, 0, 400, 60, 100, $Palette[0]);
         // imagefilledrectangle($im, 70, 400, 130, 200, $Palette[1]);
         // imagefilledrectangle($im, 140, 400, 210, 200, $Palette[2]);
         // imagefilledrectangle($im, 220, 400, 290, 80, $Palette[3]);
    imagefilledrectangle($im, 0, 395, 400, 400, $black);


    // Save the image
    imagepng($im, './images/bar_2.png');
    imagedestroy($im);
}
private function bar_3(){
    $im = imagecreatetruecolor(400, 400);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    $website = DB::table('countries')->get();
    $count = DB::table('countries')->select('value')->count();
    $i = 0;
    foreach ($website as $key => $dt) {
        $val[$i] = $dt->value;
        $i++;
    }
    if($count >= 10){
        $devided = (400 / $count)-10;
    }else{
        $devided = (400 / 10)-10;
    }
    $a = 0;
    $b = 0;
    $c = $devided;

    $sum = array_sum($val);
    imagefilledrectangle($im, 0, 0, 400, 400, $white);
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum) * 400);
        $nil[$a] = (400 - $per[$a]) -5;
        imagefilledrectangle($im, $b, 400, $c, $nil[$a], $Palette[$a]);
        $b += $devided;
        $c += $devided;
        $c += 10;
        $b += 10;
        $a++;
    }
        // dd($nil);
         // imagefilledrectangle($im, 0, 400, 60, 100, $Palette[0]);
         // imagefilledrectangle($im, 70, 400, 130, 200, $Palette[1]);
         // imagefilledrectangle($im, 140, 400, 210, 200, $Palette[2]);
         // imagefilledrectangle($im, 220, 400, 290, 80, $Palette[3]);
    imagefilledrectangle($im, 0, 395, 400, 400, $black);


    // Save the image
    imagepng($im, './images/bar_3.png');
    imagedestroy($im);
}
private function bar_4(){
    $im = imagecreatetruecolor(400, 400);
    $Palette = [
        "0" => imagecolorallocate($im, 51, 204, 255),
        "1" => imagecolorallocate($im, 40, 167, 69),
        "2" => imagecolorallocate($im, 255, 153, 51),
        "3" => imagecolorallocate($im, 204, 0, 102),
        "4" => imagecolorallocate($im, 204, 51, 0),
        "5" => imagecolorallocate($im, 255, 255, 0),
        "6" => imagecolorallocate($im, 0, 0, 255),
        "7" => imagecolorallocate($im, 255, 0, 0),
        "8" => imagecolorallocate($im, 102, 0, 102),
        "9" => imagecolorallocate($im, 153, 153, 102)
    ];
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    $website = DB::table('social_media')->get();
    $count = DB::table('social_media')->select('value')->count();
    $i = 0;
    foreach ($website as $key => $dt) {
        $val[$i] = $dt->value;
        $i++;
    }
    if($count >= 10){
        $devided = (400 / $count)-10;
    }else{
        $devided = (400 / 10)-10;
    }
    $a = 0;
    $b = 0;
    $c = $devided;

    $sum = array_sum($val);
    imagefilledrectangle($im, 0, 0, 400, 400, $white);
    foreach ($val as $key => $v) {
        $per[$a] = round(($v / $sum) * 400);
        $nil[$a] = (400 - $per[$a]) -5;
        imagefilledrectangle($im, $b, 400, $c, $nil[$a], $Palette[$a]);
        $b += $devided;
        $c += $devided;
        $c += 10;
        $b += 10;
        $a++;
    }
        // dd($nil);
         // imagefilledrectangle($im, 0, 400, 60, 100, $Palette[0]);
         // imagefilledrectangle($im, 70, 400, 130, 200, $Palette[1]);
         // imagefilledrectangle($im, 140, 400, 210, 200, $Palette[2]);
         // imagefilledrectangle($im, 220, 400, 290, 80, $Palette[3]);
    imagefilledrectangle($im, 0, 395, 400, 400, $black);


    // Save the image
    imagepng($im, './images/bar_4.png');
    imagedestroy($im);
}
private function img_table1(){

    $registrars = DB::table('registrars')->get();
    $f = 0;
    foreach ($registrars as $key => $dt) {
        $active[$f] = $dt->active;
        $not_active[$f] = $dt->not_active;
        $im = imagecreatetruecolor(100, 20);
        $black = imagecolorallocate($im, 0, 0, 0);
        $blue = imagecolorallocate($im, 51, 204, 255);
        $green = imagecolorallocate($im, 40, 167, 69);
        imagefilledrectangle($im, 0, 0, 100, 20, $green);
        imagefilledrectangle($im, 0, 0, 3, 20, $black);
        imagefilledrectangle($im, 3, 0, $active[$f], 20, $blue);

         // Save the image
        imagepng($im, "./images/table_res-$f.png");
        imagedestroy($im);
        $f++;
    }
}
private function img_table2(){

        $sub = DB::table('subdomain')->get();
        $k = 0;
        foreach ($sub as $key => $dt) {
            $val10[$k] = $dt->value;
            $k++;
        }
        $sum10 = array_sum($val10);
    $z =0;
    foreach ($sub as $key => $dt) {
        $val[$z] = $dt->value;
        $per[$z] = round(($val[$z]/ $sum10)* 100);
        $im = imagecreatetruecolor(100, 20);
        $black = imagecolorallocate($im, 0, 0, 0);
        $blue = imagecolorallocate($im, 51, 204, 255);
        $white = imagecolorallocate($im, 255, 255, 255);
        
        imagefilledrectangle($im, 0, 0, 100, 20, $white);
        imagefilledrectangle($im, 0, 0, 3, 20, $black);
        imagefilledrectangle($im, 3, 0, $per[$z], 20, $blue);

         // Save the image
        imagepng($im, "./images/table_sub-$z.png");
        imagedestroy($im);
        $z++;
    }
}
private function img_table3(){

   $mx_domains = DB::table('mx_domains')->get();
        $n = 0;
        foreach ($mx_domains as $key => $dt) {
            $val13[$n] = $dt->value;
            $n++;
        }
        $sum13 = array_sum($val13);
    $f = 0;
    foreach ($mx_domains as $key => $dt) {
        $val[$f] = $dt->value;
        $per[$f] = round(($val[$f] / $sum13) * 100);
        $im = imagecreatetruecolor(100, 20);
        $black = imagecolorallocate($im, 0, 0, 0);
        $blue = imagecolorallocate($im, 51, 204, 255);
        $white = imagecolorallocate($im, 255, 255, 255);
        imagefilledrectangle($im, 0, 0, 100, 20, $white);
        imagefilledrectangle($im, 0, 0, 3, 20, $black);
        imagefilledrectangle($im, 3, 0, $per[$f], 20, $blue);

         // Save the image
        imagepng($im, "./images/table_mx-$f.png");
        imagedestroy($im);
        $f++;
    }
}
private function img_table4(){

   $dns_ns = DB::table('dns_ns')->get();
        $o = 0;
        foreach ($dns_ns as $key => $dt) {
            $val14[$o] = $dt->value;
            $o++;
        }
        $sum14 = array_sum($val14);
    $f = 0;
    foreach ($dns_ns as $key => $dt) {
        $val[$f] = $dt->value;
        $per[$f] = round(($val[$f] / $sum14) * 100);
        $im = imagecreatetruecolor(100, 20);
        $black = imagecolorallocate($im, 0, 0, 0);
        $blue = imagecolorallocate($im, 51, 204, 255);
        $white = imagecolorallocate($im, 255, 255, 255);
        imagefilledrectangle($im, 0, 0, 100, 20, $white);
        imagefilledrectangle($im, 0, 0, 3, 20, $black);
        imagefilledrectangle($im, 3, 0, $per[$f], 20, $blue);

         // Save the image
        imagepng($im, "./images/table_ns-$f.png");
        imagedestroy($im);
        $f++;
    }
}
private function img_table5(){

   $complet = DB::table('completeness')->get();
    $f = 0;
    foreach ($complet as $key => $dt) {
        $val[$f] = $dt->value;
        
        $im = imagecreatetruecolor(100, 20);
        $black = imagecolorallocate($im, 0, 0, 0);
        $blue = imagecolorallocate($im, 51, 204, 255);
        $white = imagecolorallocate($im, 255, 255, 255);
        imagefilledrectangle($im, 0, 0, 100, 20, $white);
        imagefilledrectangle($im, 0, 0, 3, 20, $black);
        imagefilledrectangle($im, 3, 0, $val[$f], 20, $blue);

         // Save the image
        imagepng($im, "./images/table_com-$f.png");
        imagedestroy($im);
        $f++;
    }
}
private function img_table6(){

   $ssl = DB::table('ssl_issue')->get();
        $p = 0;
        foreach ($ssl as $key => $dt) {
            $val15[$p] = $dt->value;
            $p++;
        }
        $sum15 = array_sum($val15);
    $f = 0;
    foreach ($ssl as $key => $dt) {
        $val[$f] = $dt->value;
        $per[$f] = round(($val[$f] / $sum15) * 100);
        if($per[$f] <= 0){
            $per[$f] = 4;
        }
        $im = imagecreatetruecolor(100, 20);
        $black = imagecolorallocate($im, 0, 0, 0);
        $blue = imagecolorallocate($im, 51, 204, 255);
        $white = imagecolorallocate($im, 255, 255, 255);
        imagefilledrectangle($im, 0, 0, 100, 20, $white);
        imagefilledrectangle($im, 0, 0, 3, 20, $black);
        imagefilledrectangle($im, 3, 0, $per[$f], 20, $blue);

         // Save the image
        imagepng($im, "./images/table_ssl-$f.png");
        imagedestroy($im);
        $f++;
    }
}
}

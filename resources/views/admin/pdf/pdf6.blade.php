<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pdf 5</title>
  <style type="text/css">
    .container{
    width: 595px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }
  .full{
    width: 100%;
    text-align: justify;
    position: relative;
    padding: 0px 10px 10px 10px;
    left: 0;
    clear: both;
    font-size: 12px;
  }
  td .o{
    width: 5%;
  }
  td .large{
    width: 30%;
  }
  .up{
    width: 100%;
    text-align: justify;
    position: relative;
    padding: 0px 10px 10px 10px;
    left: 0;
    clear: both;
    font-size: 14px;
  }
  #table_left {
    width: 60%;
    margin: 0px;
    padding: 10px 10px 10px 0px;
    text-align: justify;
    position: relative;
    float: left;
    clear: both;
    font-size: 12px;
  }
  td #paragraf{
    padding-right: -10px;
  }
  .image_right{
    float: right;
    position: relative;
    padding-left: 15px;
  }
  .image2{
    float: left;
    position: relative;
    padding: 15px;
    width: 560px;
    height: 30px;
    clear: both;
  }
  #title{
    position: relative;
    font-weight: bold;
    clear: both;
    padding-left: 15px;
  }
  .color1{
    color: #33ccff;
    font-size: 30px;
    float: right;
    padding-top: -20px;
  }
  .color2{
    color: #28a745;
    font-size: 30px;
    float: right;
    padding-top: -20px;
  }
  .color3{
    color: #ff9933;
    font-size: 30px;
    float: right;
    padding-top: -20px;
  }
  .color4{
    color: #cc0066;
    font-size: 30px;
    float: right;
    padding-top: -20px;
  }
  .color5{
    color: #cc3300;
    font-size: 30px;
    float: right;
    padding-top: -20px;
  }
  .list{
    overflow: auto;
  }
  .list li{
    height: 10px;
  }
  .list li p{
   color: black;
   font-size: 12px;
   text-align: left;
  }
  .list li:nth-child(1){
    color: #33ccff;
    font-size: 30px;
  }
  .list li:nth-child(2){
    color: #28a745;
    font-size: 30px;
  }
  .list li:nth-child(3){
    color: #ff9933;
    font-size: 30px;
  }
  .list li:nth-child(4){
    color: #cc0066;
    font-size: 30px;
  }
  .list li:nth-child(5){
    color: #cc3300;
    font-size: 30px;
  }
  .list li:nth-child(6){
    color: #ffff00;
    font-size: 30px;
  }
  .list li:nth-child(7){
    color: #0000ff;
    font-size: 30px;
  }
  .list li:nth-child(8){
    color: #660066;
    font-size: 30px;
  }
  .list li:nth-child(9){
    color: #ff0066;
    font-size: 30px;
  }
  .list li:nth-child(10){
    color: #999966;
    font-size: 30px;
  }
  .sp{
  width: 100px;
  display: inline-block;
  }
.satu {
  width: 100%;
  height: 10px;
  background: #33ccff;
  float: left;
}

.dua {
  width: 100%;
  height: 10px;
  background: #28a745;
}
.left{
  float: left;
  font-size: 13px;
  font-weight: bold;
  clear: both;
  padding-left: 15px;
}
.right{
  float: right;
  font-size: 13px;
  font-weight: bold;
  clear: both;
  padding-right: 15px;
}
.paragraf{
  font-size: 12px;
  padding-left: 15px;
  text-align: justify;
}
.left-table{
  float: left;
  width: 50%;
  position: relative;
  clear: both;
}
.right-paragraf{
  position: relative;
  float: right;
  text-align: justify;
  font-size: 12px;
  clear: both;
  width: 50%;
}
</style>
</head>
<body>
  <div class="container">
    <h4 id="title">Hosting</h4>
    <table class="up">
      <tr>
        <td>
          If a domain results in an actual website, parking page or placeholder then this website is hosted at a hosting company. This chapter gives insight in what companies these websites are hosted at, and in what countries.
        </td>
      </tr>
    </table>
    <h4 id="title">Hosting company</h4>
    <p class="paragraf">
      The hosting company is also known as the AS company. This company is responsible for the network on which the website is hosted and owns the IP address the website is on. The hosting company corresponds with the assigned AS number . The following chart shows were most website are hosted and how many are developed.
    </p>
    <table class="full">
      <tr>
        <td>Company</td>
        <td class="o"><ul><li class="color1"></li></ul></td>
        <td>Domain</td>
        <td class="o"><ul><li class="color2"></li></ul></td>
        <td>Developed</td>
        <td class="o"><ul><li class="color3"></li></ul></td>
        <td>Undeveloped</td>
      </tr>
      <?php foreach ($company as $key => $dt): ?>
      <tr>
        <td>{{ $dt->company }}</td>
        <td class="o"><ul><li class="color1"></li></ul></td>
        <td>{{ $dt->domains }}</td>
        <td class="o"><ul><li class="color2"></li></ul></td>
        <td>{{ $dt->developed }}</td>
        <td class="o"><ul><li class="color3"></li></ul></td>
        <td>{{ $dt->undeveloped }}</td>
    </tr>
  <?php endforeach ?>s
    </table>
  
    <h4 id="title">Hosting country</h4>
    <img src="images/canvas5.png" alt="image" class="image2">
    <br>
    <br><br>
    <table class="left-table">
      <tbody>
        <ul class="list">
          <?php foreach ($country as $key => $dt): 
          $per = round(($dt->value/ $sum ) *100 );
          ?>
          <li><p>{{ $dt->country }}  {{ $dt->value }} <b>{{ $per }}%</b></p></li>
        <?php endforeach ?>
        </ul>
    </tbody>
    </table>
    <p class="right-paragraf">
      Hosting country refers to the country where the website is hosted. Our crawler determines the hosting country based on the IP Address of a website. The hosting country can differ from the country where the company behind the website is based.
    </p>
  </div>
</body>
</html>
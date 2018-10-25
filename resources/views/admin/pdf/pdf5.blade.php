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
    padding-left: 20px;
    position: relative;
    clear: both;
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
  </style>
</head>
<body>
  <div class="container">
    <h4 id="title">Renewal probability</h4>
    <table class="up">
      <tr>
        <td>
          At Dataprovider.com we see milions of domains come online and go offline. we took features of these domains like their content, age, popularit and activity and created a model to predict if a domain will get renewed or not. We call this score the 'Reneal probability'.
        </td>
      </tr>
    </table>
    <h4 id="title">Renewal probability</h4>
    <table id="table_left">
      <tr>
        <td>
          <ul class="list">
            <?php
            foreach($data  as $dt): ?>
            <li><p> {{ $dt->name }} ({{ $dt->value }}) </p></li>
            
          <?php endforeach  ?>
        </ul>
      </td>
    </tr>
      <tr>
        <td id="paragraf" colspan="3"><p class="paragraf">
          If a domain has a low reneal probability, then it is very likely the domain will drop within a year . Domain with a high renewal probability will most likely renew.
        </p></td>
      </tr>
    </table>
    <img class="image_right" src="images/probability.png" height="200px" width="200px" align="left">
    <h4 id="title">Top 15 registrars with high renewal risk</h4>
    <p class="paragraf">
      In the following chart we display the top 15 registrar and their renewal probability . It's not only the number of domains that is important to know, but also how many of these domains get renewad . The chart shows for each registrar how many domains they have and how many domains are probably not going to get renewed (higher is better).
    </p>
    <table class="full">
      <tbody>
      <tr>
        <td class="large"><b>Top 15 registrars</b></td>
        <td class="o"><ul><li class="color1"></li></ul></td>
        <td><b>Domains</b></td>
        <td class="o"><ul><li class="color2"></li></ul></td>
        <td><b>Low renewal est.</b></td>
      </tr>
      <?php foreach($regis  as $dt): ?>
        <tr>
          <td> -{{ $dt->hosting }} </td>
          <td class="o"><ul><li class="color1"></li></ul></td>
          <td class="large"> {{ $dt->domains }} </td>
          <td class="o"><ul><li class="color2"></li></ul></td>
          <td></td>
        </tr>
      <?php endforeach  ?>
    </tbody>
    </table>
  </div>
</body>
</html>
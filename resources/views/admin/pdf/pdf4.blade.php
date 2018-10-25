<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chart1</title>

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
  #content {
    width: 60%;
    margin: 0px;
    padding: 10px 10px 10px 0px;
    text-align: justify;
    position: relative;
    float: right;
    clear: both;
    font-size: 12px;
  }
  td #paragraf{
    padding-right: -10px;
  }
  .image{
    float: left;
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
</style>
</head>
<body>
  <div class="container">
    <h4 id="title">Heartbeat</h4>
    <table class="up">
      <tr>
        <td>
          Every month we index all the website we track again and update all the varaiables . Besides updating we also archive all the result and keep track of all the changes. The monthly number of weighted changes result in a heartbeat.
        </td>
      </tr>
    </table>
    <h4 id="title">Heartbeat</h4>
    <img src="images/canvas4.png" alt="image" class="image2">
    <br>
    <br>
    <p class="left">Active</p><p class="right">Not Active</p>
    <h4 id="title">Pulse</h4>
    <img class="image" src="images/pulse.png" height="200px" width="200px" align="left">
    <table id="content">
      <tr>
        <td>
          <ul class="list">
            <?php
            foreach($data  as $dt): ?>
            <li><p> {{ $dt->pulse_name }} ({{ $dt->value }}) </p></li>
            
          <?php endforeach  ?>
        </ul>
      </td>
    </tr>
      <tr>
        <td id="paragraf" colspan="4"><p>
          Not every change has the same importance . Changing the CMS of a website has a higher  impact then only adding another email address to a contact page. By weighting every changing variable we calculate a pulse. Basically the strength of the pulse indicates if a website is being used and maintained by its owners or not.
        </p></td>
      </tr>
    </table>
    <h4 id="title">Top 10 registrars</h4>
    <table class="full">
      <tbody>
      <tr>
        <td class="large"><b>Hosting</b></td>
        <td class="large"></td>
        <td><b>Domains</b></td>
        <td class="o"><ul><li class="color1"></li></ul></td>
        <td><b>Active</b></td>
        <td class="o"><ul><li class="color2"></li></ul></td>
        <td><b>Not active</b></td>
      </tr>
      <?php foreach($regis  as $dt): ?>
        <tr>
          <td> {{ $dt->hosting }} </td>
          <td class="large"><div class="sp"><div class="satu"><div class="dua" style="margin-left: {{ $dt->active }}%;"></div></div></td>
          <td class="large"> {{ $dt->domains }} </td>
          <td class="o"><ul><li class="color1"></li></ul></td>
          <td> {{ $dt->active }} %</td>
          <td class="o"><ul><li class="color2"></li></ul></td>
          <td> {{ $dt->not_active }}% </td>
        </tr>
      <?php endforeach  ?>
    </tbody>
    </table>
  </div>
</body>
</html>
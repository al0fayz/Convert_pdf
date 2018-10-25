<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>pdf 8</title>

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
.span{
  width: 100px;
  display: inline-block;
}
.one{
  width: 100%;
  height: 10px;
  background: #33ccff;
  float: left;
}
.two{
  height: 10px;
  width: 100%;
  background: #ffffff;
}
.paragraf{
  font-size: 12px;
  padding-left: 15px;
}
</style>
</head>
<body>
  <div class="container">
    <h4 id="title">DNS</h4>
    <table class="up">
      <tr>
        <td>
          The domain Name System (DNS) is a naming system for doamin names. It translate domain names to numerical IP address. 
        </td>
      </tr>
    </table>
    <h4 id="title">DNS type</h4>
    <img class="image" src="images/dns.png" height="200px" width="200px" align="left">
    <table id="content">
      <tr>
        <td>
          <ul class="list">
            <?php
            foreach($dns  as $dt):
            $per = round(($dt->value /$sum) *100);
             ?>
            <li><p> {{ $dt->name }} ({{ $dt->value }}) <b>{{ $per }}%</b></p></li>
            
          <?php endforeach  ?>
        </ul>
      </td>
    </tr>
    </table>
    <h4 id="title">DNS TXT</h4>
    <p class="paragraf">
      Dataprovider.com does not only index the website, we also index the DNS records. For each domain we collect the A(IPv4), AAAA coverage of these records in the zone file. 
    </p>
    <table>
      <tbody>
        <tr>
          <ul class="list">
            <?php
            foreach($dns_txt  as $dt):
            $per = round(($dt->value /$sum) *100);
             ?>
            <li><p> {{ $dt->name }} ({{ $dt->value }}) <b>{{ $per }}%</b> {{ $dt->ket }}</p></li>
            
          <?php endforeach  ?>
          </ul>
        </tr>
      </tbody>
    </table>
    <h4 id="title">Top 5 MX domians</h4>
    <table class="full">
      <tbody>
      <?php foreach($mx_domains  as $d): 
      $p = round(($d->value / $s) *100);
      ?>
        <tr>
          <td> {{ $d->name }} </td>
          <td class="large"><div class="span"><div class="one"><div class="two" style="margin-left: {{ $p }}%;"></div></div></td>
          <td></td>
          <td> {{ $d->value }} </td>
          <td><b> {{ $p }} %</b></td>
        </tr>
      <?php endforeach  ?>
    </tbody>
    </table>
  </div>
</body>
</html>
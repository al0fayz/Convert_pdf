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
    <h4 id="title">DNS AAAA records IPV6</h4>
    <table class="up">
      <tr>
        <td>
          Every device on the internet is assigned a unique IP. with the rapid growth of the internet in the 1990s, it became evident that far more address would be needed to connect devices than the IPV4 address spaced had available. IPV6 was to deal with the longanticipated problem of IPv4 address exhaustion . IPv6 is intented to replace IPv4. Not many devices make use of IPv6 yet. The following chart show the availibility of IPv6.  
        </td>
      </tr>
    </table>
    <img src="images/canvas8.png" alt="image" class="image2">
    <h4 id="title">DNS NS(Nameserver)</h4>
    <p class="paragraf">
      The NS record (nameserver) is a computer that is permanently connected to the internet and translates domain names into IP address. it contains the DNS of domain with all IP address that belong to that domain. Mostly the NS record contains a hostname of the register were the domain is registered . The following chart shows the most used nameserver (registars).
    </p>
    <table class="full">
      <tbody>
        <?php foreach($dns_ns  as $ns):
            $per = round(($ns->value /$sum) *100);
             ?>
             <tr>
               <td>{{ $ns->name }}</td>
               <td class="large"><div class="span"><div class="one"><div class="two" style="margin-left: {{ $per }}%"></div></div></td>
               <td>{{ $ns->value }}</td>
               <td><b>{{ $per }}%</b></td>
             </tr>
          <?php endforeach  ?>
      </tbody>
    </table>
  </div>
</body>
</html>
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
    padding: 10px;
    left: 0;
    clear: both;
    font-size: 12px;
  }
  .full td{
    padding-right: 10px;
  }
  .up{
    width: 100%;
    text-align: justify;
    position: relative;
    padding: 10px;
    left: 0;
    clear: both;
    font-size: 14px;
  }
  #content {
    width: 40%;
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
  .list li p{
   color: black;
   font-size: 12px;
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
.box{
  border: #ffffff 1px solid;
  background-color: #000066;
  margin: 0;
  padding: 10px;
  font-size: 12px;
}
</style>
</head>
<body>
  <div class="container">
    <h4 id="title">Website redirect</h4>
    <table class="up">
      <tr>
        <td>
          A redirect is a technique which can be used to redirect a domain to or URL, A redirect can be implemented 'server side' or 'client side' . A server side redirect is done b using a 3xx status code followed by the new destination . A client side redirect is done by using a piece of javascript or a META refresh . The crawler cannot execute javascript so onl detects server side redirect . The following chart show what TLD's are redirected b domains: 
        </td>
      </tr>
    </table>
    <img class="image" src="images/website.png" height="200px" width="300px" align="left">
    <table id="content">
      <tr>
        <td>
          <ul class="list">
            <?php
            foreach($data  as $dt): ?>
            <li><p> {{ $dt->website }} ({{ $dt->value }}) </p></li>
            
          <?php endforeach  ?>
        </ul>
      </td>
    </tr>
  </table>
  <h4 id="title">Top 15 regitrars</h4>
  <table class="full">
    <tr>
      <td>
        In the following chart we display the top 15 registrars . it's not only the number of domains that is important to know but also how these domains are being used . The chart shows for each registrar how many domains the have and how man are actually avilable (contain a website ) and developed (higher is better).
      </td>
    </tr>
  </table>
  <table class="full">
    <tbody>
      <tr>
        <td><b>Hosting</b></td>
        <td><ul><li class="color1"></li></ul></td>
        <td><b>Domains</b></td>
        <td><ul><li class="color2"></li></ul></td>
        <td><b>Available</b></td>
        <td><ul><li class="color3"></li></ul></td>
        <td><b>Developed</b></td>
      </tr>
      <?php foreach($regis  as $dt): ?>
        <tr>
          <td> {{ $dt->hosting }} </td>
          <td><ul><li class="color1"></li></ul></td>
          <td> {{ $dt->domains }} </td>
          <td><ul><li class="color2"></li></ul></td>
          <td> {{ $dt->available }} </td>
          <td><ul><li class="color3"></li></ul></td>
          <td> {{ $dt->developed }} </td>
        </tr>
      <?php endforeach  ?>
    </tbody>
  </table>
  <div class="box">
  <p>
    Note <br>
    In order to determine the register Dataprovider.com relies on the availability of WHOIS information that can have a deviation and a mapping between the DNS nameserver and registrars.
  </p>
</div>
</div>
</body>
</html>
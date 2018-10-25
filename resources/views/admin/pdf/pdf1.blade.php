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
</style>
</head>
<body>
  <div class="container">

    <table class="up">
      <tr>
        <td>
          In November we've analyzed 94,020 domains with our crawlers, The results from that crawl are used to generate this report. Not every domain contains a website. This chapter gives insights into the responses of the domains.
        </td>
      </tr>
    </table>
    <h4 id="title">Response</h4>
    <img class="image" src="images/file.png" height="200px" width="200px" align="left">
    <table id="content">
      <tr>
        <td>
          <ul class="list">
            <?php foreach ($data as $dt): 
            $p = round(($dt->value / $sum) * 100);
            ?>
            <li><p>{{ $dt->name }} {{ $dt->value }} <b>{{ $p }}%</b></p></li>
          <?php endforeach ?>
        </ul></td>
      </tr>
      <tr>
        <td id="paragraf" colspan="4"><p>When we Index a domain there can be four type of response. If a domain name is 'available' it means that we have received a valid response with status code 1xx or 2xx . A domain can also result in a 'host not found' response . This means there is no IP configured in the DNS for this domain . If the response is a 'redirect' then we received a service side redirect with status code 3xx. The last response type is an 'Access denied', this means the crawler could not access the website and recieved status code 4xx, 5xx, or 9xx. The following paragraph gives more details about the cause of the access denied.
        </p></td>
      </tr>
    </table>
    <h4 id="title">Access Denied</h4>
    <table class="full">
      <tr>
        <td>
          An 'Access denied' means that the crawler can't access the website. This can occur when the DNS is not configured, the server is unavailable or access is not allowed. in most cases there is no website (DNS is not configured) but sometimes there is, in that case the hosting 
          provider, Webmaster or CMS of the website doesn't allow the crawler to visit the website. if a domain result in an Access denied the 'Status Code' explains why access was denied. In the following chart you can see the top 5 reasons why some domains resulted in an access denied. 
        </td>
      </tr>
    </table>
    <img src="images/canvas2.png" alt="image" class="image2">
    <table class="full">
      <tbody>
        <ul class="list">
          <?php foreach ($access as $dt): 
          $pr = round(($dt->value / $sm) * 100);
          ?>
            <li><p>{{ $dt->code }}{{ $dt->name }} {{ $dt->value }} <b>{{ $pr }}%</b></p></li>
          <?php endforeach ?>
        </ul>
      </tbody>
    </table>
  </div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>pdf2</title>

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
.left{
  float: left;
  clear: both;
  position: relative;
  padding-top: 45px;
  padding-left: 15px;
}
.right{
  float: right;
  clear: both;
  position: relative;
  padding-top: 45px;
  padding-right: 15px;
}
</style>
</head>
<body>
  <div class="container">
    <h4 id="title">Available</h4>
    <table class="up">
      <tr>
        <td>
          When a domain result in an actual website we say the response is available. We have not looked at the actual content et. The content of a domain is important for reneals. A domain that is available can be 'developed' or 'undeveloped' . A developed website is a ebsite that contains real, manually created content. Somebody took time and effort to create this website . The opposite is an undeveloped website . This is q website that contain a placeholder (default page from the registar), is paked . Contains almost no content or shows the content from another website(frame).
        </td>
      </tr>
    </table>
    <img src="images/canvas3.png" alt="image" class="image2">
    <?php  
    $tot = $sum + $sm; 
    $dev = round(($sum / $tot) *100);
    $un = round(($sm / $tot) *100);
    ?>
    <div class="left">Developed ({{ $sum }}) <b>{{ $dev }}%</b></div>
    <div class="right">Undeveloped ({{ $sm }}) <b>{{ $un }}%</b></div>
    <h4 id="title">Developed</h4>
    <img class="image" src="images/developed.png" height="200px" width="200px" align="left">
    <table id="content">
      <tr>
        <td>
          <ul class="list">
            <?php 
            @if (is_array($dev) || is_object($dev)){
              foreach($dev as $dt){
               $p = round(($dt->value / $sum) * 100);
               echo "<li><p>" .$dt->name $dt->value "<b>" .$p "%</b></p></li>";
             } 
           }
           ?>
         </ul>
       </td>
     </tr>
     <tr>
      <td id="paragraf" colspan="4"><p>
        A developed ebsite is a website that contains real, manually created content . somebody took time and effort in creating this website. Developed website are good for renewals. when we index the website we look at the content and classify it. if our craler is able to identify features like a company name, phone number and adress then we classify it as a 'Bussiness' website . If the website offers the possibility to buy products or services on it we call it 'e-Commerce'. A website classified as 'content' is mostly a personal website sometimes websites also fullfill a special task like a blog or a forum. 
      </p></td>
    </tr>
  </table>
  <h4 id="title">UNdeveloped</h4>
  <img class="image" src="images/developed.png" height="200px" width="200px" align="left">
  <table id="content">
    <tr>
      <td>
        <ul class="list">
          <?php foreach ($un as $dt):
          $p = round(($dt->value / $sum) * 100);
          ?>
          <li><p>{{ $dt->name }} {{ $dt->value }} <b>{{ $p }}%</b></p></li>
        <?php endforeach ?>
      </ul>
    </td>
  </tr>
  <tr>
    <td id="paragraf" colspan="4"><p>
      An undevelop website is a website that contains a placeholder (default page from the registrar), is parked , has almost no content or shows the content of another website  (frame). An undeveloped website is not good for renewals . if people didn't take the effort to put a website on the domain, then the chance of a domain being renewad is lower.
    </p></td>
  </tr>
</table>
</div>
</body>
</html>
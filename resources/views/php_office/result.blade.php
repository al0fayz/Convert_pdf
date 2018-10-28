<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chart1</title>

  <style type="text/css">

  .container{
    width: 700px;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }
  .full{
    width: 100%;
    text-align: justify;
    position: relative;
    clear: both;
    font-size: 12px;
  }
  .full td{
    padding-right: 10px;
  }
  .full td .one{
    width: 10px;
  }
  .up{
    text-align: justify;
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
  #content td #one{
    width: 10px;
  }
  td #paragraf{
    /*padding-right: -10px;*/
  }
  .image{
    float: left;
    position: relative;
    padding-left: 15px;
    width: 200px;
  }
  .image2{
    float: left;
    position: relative;
    width: 100%;
    height: 30px;
    clear: both;
  }
  #title{
    position: relative;
    font-weight: bold;
    clear: both;
  }
  .justify{
    font-size: 12px;
    text-align: justify;
  }
  .left{
    font-size: 14px;
    float: left;
    position: relative;
  }
  .right{
    font-size: 14px;
    float: right;
    position: relative;
  }
  .box{
    border: #ffffff 1px solid;
    background-color: #000066;
    font-size: 12px;
  }
  .box-in{
    color: white;
    padding: 0px 10px 0px 10px;
  }
  #table_left {
    width: 50%;
    margin: 0px;
    padding: 10px 10px 10px 0px;
    text-align: justify;
    position: relative;
    float: left;
    clear: both;
    font-size: 12px;
  }
  .image_right{
    float: right;
    position: relative;
    padding-left: 15px;
  }
  .right-p{
    font-size: 12px;
    text-align: justify;
    width: 50%;
    float: right;
  }
</style>
</head>
<body>
  <div class="container">

   <!--  page 1 -->
   <p class="up">
    In November we've analyzed 94,020 domains with our crawlers, The results from that crawl are used to generate this report. Not every domain contains a website. This chapter gives insights into the responses of the domains.
  </p>
  <h4 id="title">Response</h4>
  
  <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_res.png'}}" />
  <table id="content">
    <tbody>
      @php $z01 =0;
      @endphp
      @foreach ($response as $dt)
      @php
      $pr1 = round(($dt->value / $sum1) * 100);
      @endphp
      <tr>
        <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z01 .'.png'}}" /></td>
        <td>{{ $dt->name }}</td>
        <td>{{ $dt->value }}</td>
        <td><b>{{ $pr1 }}%</b></td>
      </tr>
      @php  $z01++;
      @endphp
      @endforeach
      <tr>
        <td id="paragraf" colspan="4"><p class="justify">When we Index a domain there can be four type of response. If a domain name is 'available' it means that we have received a valid response with status code 1xx or 2xx . A domain can also result in a 'host not found' response . This means there is no IP configured in the DNS for this domain . If the response is a 'redirect' then we received a service side redirect with status code 3xx. The last response type is an 'Access denied', this means the crawler could not access the website and recieved status code 4xx, 5xx, or 9xx. The following paragraph gives more details about the cause of the access denied.
        </p></td>
      </tr>
    </tbody>
  </table>
  <h4 id="title">Access Denied</h4>
  <p class="justify">
    An 'Access denied' means that the crawler can't access the website. This can occur when the DNS is not configured, the server is unavailable or access is not allowed. in most cases there is no website (DNS is not configured) but sometimes there is, in that case the hosting 
    provider, Webmaster or CMS of the website doesn't allow the crawler to visit the website. if a domain result in an Access denied the 'Status Code' explains why access was denied. In the following chart you can see the top 5 reasons why some domains resulted in an access denied. 
  </p>
  
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_1.png'}}" />
  <table class="full">
   <tbody>
    @php  $z02 = 0;
    @endphp
    @foreach ($access as $dt)
    @php
    $pr2 = round(($dt->value / $sum2) * 100);
    @endphp
    <tr>
      <td class="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z02 .'.png'}}" /></td>
      <td>{{ $dt->code }}</td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $pr2 }}%</b></td>
    </tr>
    @php $z02++;
    @endphp
    @endforeach
  </tbody>
</table>
<br><br>
<!-- page 2 -->
<h4 id="title">Available</h4>
<p class="justify">
  When a domain result in an actual website we say the response is available. We have not looked at the actual content et. The content of a domain is important for reneals. A domain that is available can be 'developed' or 'undeveloped' . A developed website is a ebsite that contains real, manually created content. Somebody took time and effort to create this website . The opposite is an undeveloped website . This is q website that contain a placeholder (default page from the registar), is paked . Contains almost no content or shows the content from another website(frame).
</p>

<img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_2.png'}}" />
@php  
$tot = $sum3 + $sum4; 
$dev = round(($sum3 / $tot) *100);
$un = round(($sum4 / $tot) *100);
@endphp
<br><br>
<div class="left">Developed ({{ $sum3 }}) <b>{{ $dev }}%</b></div>
<div class="right">Undeveloped ({{ $sum4 }}) <b>{{ $un }}%</b></div>
<h4 id="title">Developed</h4>

<img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_dev.png'}}" />
<table id="content">
  <tbody>
    @php $z02 =0;
    @endphp
    @foreach ($developed as $dt)
    @php
    $pr_dev = round(($dt->value / $sum3) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z02 .'.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $pr_dev }}%</b></td>
    </tr>
    @php  $z02++;
    @endphp
    @endforeach
    <tr>
      <td id="paragraf" colspan="4"><p class="justify">
        A developed ebsite is a website that contains real, manually created content . somebody took time and effort in creating this website. Developed website are good for renewals. when we index the website we look at the content and classify it. if our craler is able to identify features like a company name, phone number and adress then we classify it as a 'Bussiness' website . If the website offers the possibility to buy products or services on it we call it 'e-Commerce'. A website classified as 'content' is mostly a personal website sometimes websites also fullfill a special task like a blog or a forum. 
      </p></td>
    </tr>
  </tbody>
</table>
<h4 id="title">Undeveloped</h4>
<img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_un.png'}}" /><table id="content">
  <tbody>
    @php $z03 =0;
    @endphp
    @foreach ($undeveloped as $dt)
    @php
    $pr_dev = round(($dt->value / $sum4) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z03 .'.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $pr_dev }}%</b></td>
    </tr>
    @php  $z03++;
    @endphp
    @endforeach
    <tr>
      <td id="paragraf" colspan="4"><p>
        An undevelop website is a website that contains a placeholder (default page from the registrar), is parked , has almost no content or shows the content of another website  (frame). An undeveloped website is not good for renewals . if people didn't take the effort to put a website on the domain, then the chance of a domain being renewad is lower.
      </p></td>
    </tr>
  </tbody>
</table>
<br><br>
<!-- page 3 -->
<h4 id="title">Website redirect</h4>
<p class="justify">
  A redirect is a technique which can be used to redirect a domain to or URL, A redirect can be implemented 'server side' or 'client side' . A server side redirect is done b using a 3xx status code followed by the new destination . A client side redirect is done by using a piece of javascript or a META refresh . The crawler cannot execute javascript so onl detects server side redirect . The following chart show what TLD's are redirected b domains: 
</p>
<img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/bar_1.png'}}" />
<table id="content">
  <tbody>
    @php $z04 =0;
    @endphp
    @foreach ($website as $dt)
    @php
    $pr_dev1 = round(($dt->value / $sum5) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z04 .'.png'}}" /></td>
      <td>{{ $dt->website }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $pr_dev1 }}%</b></td>
    </tr>
    @php  $z04++;
    @endphp
    @endforeach
  </tbody>
</table>
<h4 id="title">Top 15 regitrars</h4>
<p class="justify">
  In the following chart we display the top 15 registrars . it's not only the number of domains that is important to know but also how these domains are being used . The chart shows for each registrar how many domains the have and how man are actually avilable (contain a website ) and developed (higher is better).
</p>
<table class="full">
  <tbody>
    <tr>
      <td><b>Hosting</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td><b>Domains</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td><b>Available</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-2.png'}}" /></td>
      <td><b>Developed</b></td>
    </tr>
    @foreach($regis  as $dt)
    <tr>
      <td> {{ $dt->hosting }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td> {{ $dt->domains }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td> {{ $dt->available }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-2.png'}}" /></td>
      <td> {{ $dt->developed }} </td>
    </tr>
    @endforeach
  </tbody>
</table>
<br><br>
<div class="box">
  <h4 class="box-in">Note </h4>
  <p class="box-in">
    In order to determine the register Dataprovider.com relies on the availability of WHOIS information that can have a deviation and a mapping between the DNS nameserver and registrars.
  </p>
</div>
<br><br>
<!-- page 4 -->
<h4 id="title">Heartbeat</h4>
<p class="justify">
  Every month we index all the website we track again and update all the varaiables . Besides updating we also archive all the result and keep track of all the changes. The monthly number of weighted changes result in a heartbeat.
</p>
<h4 id="title">Heartbeat</h4>

<img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_3.png'}}" />
<br>
<br>
<p class="left">Active</p><p class="right">Not Active</p>
<h4 id="title">Pulse</h4>

<img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_heart.png'}}" />
<table id="content">
  <tbody>
    @php $z3 =0;
    @endphp
    @foreach ($heartbeat as $dt)
    @php
    $pr_h = round(($dt->value / $sum6) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z3 .'.png'}}" /></td>
      <td>{{ $dt->pulse_name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $pr_h }}%</b></td>
    </tr>
    @php  $z3++;
    @endphp
    @endforeach
    <tr>
      <td id="paragraf" colspan="4"><p>
        Not every change has the same importance . Changing the CMS of a website has a higher  impact then only adding another email address to a contact page. By weighting every changing variable we calculate a pulse. Basically the strength of the pulse indicates if a website is being used and maintained by its owners or not.
      </p></td>
    </tr>
  </tbody>
</table>
<h4 id="title">Top 10 registrars</h4>
<table class="full">
  <tbody>
    <tr>
      <td><b>Hosting</b></td>
      <td></td>
      <td><b>Domains</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td><b>Active</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td><b>Not active</b></td>
    </tr>
    @php $rz09 = 0;
    @endphp
    @foreach($regis  as $dt)
    <tr>
      <td> {{ $dt->hosting }} </td>
      <td><img style="position:relative; width:100px; height:15px;" src="{{public_path() . '/images/table_res-'. $rz09 .'.png'}}" /></td>
      <td> {{ $dt->domains }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td> {{ $dt->active }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td> {{ $dt->not_active }} </td>
    </tr>
    @php
    $rz09++;
    @endphp
    @endforeach
  </tbody>
</table>
<br><br>
<!-- page 5 -->
<h4 id="title">Renewal probability</h4>
<p class="justify">
  At Dataprovider.com we see milions of domains come online and go offline. we took features of these domains like their content, age, popularit and activity and created a model to predict if a domain will get renewed or not. We call this score the 'Reneal probability'.
</p>
<h4 id="title">Renewal probability</h4>
<table id="table_left">
  @php $z30 =0;
  @endphp
  @foreach ($prob as $dt)
  @php
  $pr_p = round(($dt->value / $sum7) * 100);
  @endphp
  <tr>
    <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z30 .'.png'}}" /></td>
    <td>{{ $dt->name }}</td>
    <td>{{ $dt->value }}</td>
    <td><b>{{ $pr_p }}%</b></td>
  </tr>
  @php  $z30++;
  @endphp
  @endforeach
  <tr>
    <td colspan="3"><p class="justify">
      If a domain has a low reneal probability, then it is very likely the domain will drop within a year . Domain with a high renewal probability will most likely renew.
    </p></td>
  </tr>
</table>

<img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_prob.png'}}" class="image_right" />
<h4 id="title">Top 15 registrars with high renewal risk</h4>
<p class="justify">
  In the following chart we display the top 15 registrar and their renewal probability . It's not only the number of domains that is important to know, but also how many of these domains get renewad . The chart shows for each registrar how many domains they have and how many domains are probably not going to get renewed (higher is better).
</p>
<table class="full">
  <tbody>
    <tr>
      <td><b>Top 15 registrars</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td><b>Domains</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td><b>Low renewal est.</b></td>
    </tr>
    @foreach($regis  as $dt)
    <tr>
      <td> {{ $dt->hosting }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td> {{ $dt->domains }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td></td>
    </tr>
    @endforeach
  </tbody>
</table>
<br><br>
<!-- page 6 -->
<h4 id="title">Hosting</h4>
<p class="justify">
  If a domain results in an actual website, parking page or placeholder then this website is hosted at a hosting company. This chapter gives insight in what companies these websites are hosted at, and in what countries.
</p>
<h4 id="title">Hosting company</h4>
<p class="justify">
  The hosting company is also known as the AS company. This company is responsible for the network on which the website is hosted and owns the IP address the website is on. The hosting company corresponds with the assigned AS number . The following chart shows were most website are hosted and how many are developed.
</p>
<table class="full">
  <tbody>
    <tr>
      <td><b>Compan</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td><b>Domains</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td><b>Developed</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-2.png'}}" /></td>
      <td><b>Undeveloped</b></td>
    </tr>
    @foreach($company  as $dt)
    <tr>
      <td> {{ $dt->company }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td> {{ $dt->domains }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td>{{ $dt->developed }}</td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-2.png'}}" /></td>
      <td>{{ $dt->undeveloped }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<h4 id="title">Hosting country</h4>

<img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_4.png'}}" />
<table id="table_left">
  @php $z301 =0;
  @endphp
  @foreach ($country as $dt)
  @php
  $pr_p = round(($dt->value / $sum8) * 100);
  @endphp
  <tr>
    <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z301 .'.png'}}" /></td>
    <td>{{ $dt->country }}</td>
    <td>{{ $dt->value }}</td>
    <td><b>{{ $pr_p }}%</b></td>
  </tr>
  @php  $z301++;
  @endphp
  @endforeach
  <tr>
  </table>
  <p class="right-p">
    Hosting country refers to the country where the website is hosted. Our crawler determines the hosting country based on the IP Address of a website. The hosting country can differ from the country where the company behind the website is based.
  </p>
  <br><br>
  <!-- page 7 -->
  <h4 id="title">Subdomains</h4>
  <p class="justify">
    The subdomain refers to the first part of a domain. The most used subdomain in domain names is 'www' but there are also other subdomains, such as 'shop' or 'wiki'. The following chart shows how man domains use subdomains (other than www).
  </p>
  
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_5.png'}}" />
  <br>
  <br>
  <p class="left">Yes</p><p class="right">NO</p>
  <h4 id="title">Distribution</h4>
  
  <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_dis.png'}}" />
  <table id="content">
    @php $z30 =0;
    @endphp
    @foreach ($dis as $dt)
    @php
    $pr_p = round(($dt->value / $sum9) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z30 . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $pr_p }}%</b></td>
    </tr>
    @php  $z30++;
    @endphp
    @endforeach
    <tr>
      <td id="paragraf" colspan="4"><p class="justify">
        The number of subdomains used by a website tells something about the size of the website. Big companies tend to have multiple subdomains. The following charts show how many subdomains website have if they use subdomains and what names the used most often for a subdomain. 
      </p></td>
    </tr>
  </table>
  <h4 id="title">Top 10 subdomians</h4>
  <p class="justify">
    In the following chart we display the top 10 subdomains and how many domains use that subdomain. The subdomain refers to the first part of a domain.
  </p>
  <table class="full">
    <tbody>
      @php $su9 =0;
      @endphp
      @foreach ($sub as $dt)
      @php
      $pr_s = round(($dt->value / $sum10) * 100);
      @endphp
      <tr>
        <td>{{ $dt->name }}</td>
        <td><img style="position:relative; width:100px; height:15px;" src="{{public_path() . '/images/table_sub-' . $su9 . '.png'}}" /></td>
        <td>({{ $dt->value }})</td>
        <td><b>{{ $pr_s }}%</b></td>
      </tr>
      @php
      $su9++;
      @endphp
      @endforeach
      <tr>
      </tbody>
    </table>
    <br><br>

    <!-- page 8 -->
    <h4 id="title">DNS</h4>
    <p class="justify">
      The domain Name System (DNS) is a naming system for doamin names. It translate domain names to numerical IP address. 
    </p>
    <h4 id="title">DNS type</h4>

    <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/bar_2.png'}}" />
    <table id="content">
      @php $ij0 =0;
      @endphp
      @foreach ($dns as $dt)
      @php
      $per_dns = round(($dt->value / $sum11) * 100);
      @endphp
      <tr>
        <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $ij0 . '.png'}}" /></td>
        <td>{{ $dt->name }}</td>
        <td>{{ $dt->value }}</td>
        <td><b>{{ $per_dns }}%</b></td>
      </tr>
      @php  $ij0++;
      @endphp
      @endforeach
    </table>
    <h4 id="title">DNS TXT</h4>
    <p class="justify">
      Dataprovider.com does not only index the website, we also index the DNS records. For each domain we collect the A(IPv4), AAAA coverage of these records in the zone file. 
    </p>
    <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_6.png'}}" />
    <table class="full">
      <tbody>
        @php $ok0 =0;
        @endphp
        @foreach ($dns_txt as $dt)
        @php
        $per_txt = round(($dt->value / $sum12) * 100);
        @endphp
        <tr>
          <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $ok0 . '.png'}}" /></td>
          <td>{{ $dt->name }}</td>
          <td>{{ $dt->value }}</td>
          <td><b>{{ $per_txt }}%</b></td>
          <td>{{ $dt->ket }}</td>
        </tr>
        @php  $ok0++;
        @endphp
        @endforeach
      </tbody>
    </table>
    <h4 id="title">Top 5 MX domians</h4>
    <table class="full">
      <tbody>
       @php $vk87 =0;
       @endphp
       @foreach ($mx as $dt)
       @php
       $per_mx = round(($dt->value / $sum13) * 100);
       @endphp
       <tr>
        <td>{{ $dt->name }}</td>
        <td><img style="position:relative; width:100px; height:15px;" src="{{public_path() . '/images/table_mx-' . $vk87 . '.png'}}" /></td>
        <td>{{ $dt->value }}</td>
        <td><b>{{ $per_mx }}%</b></td>
      </tr>
      @php  $vk87++;
      @endphp
      @endforeach
    </tbody>
  </table>
  <br><br>

  <!-- page 9 -->
  <h4 id="title">DNS AAAA records IPV6</h4>
  <p class="justify">
    Every device on the internet is assigned a unique IP. with the rapid growth of the internet in the 1990s, it became evident that far more address would be needed to connect devices than the IPV4 address spaced had available. IPV6 was to deal with the longanticipated problem of IPv4 address exhaustion . IPv6 is intented to replace IPv4. Not many devices make use of IPv6 yet. The following chart show the availibility of IPv6. 
  </p>
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_7.png'}}" />
  <p class="left">Yes</p>
  <p class="right">No</p>
  <h4 id="title">DNS NS(Nameserver)</h4>
  <p class="justify">
    The NS record (nameserver) is a computer that is permanently connected to the internet and translates domain names into IP address. it contains the DNS of domain with all IP address that belong to that domain. Mostly the NS record contains a hostname of the register were the domain is registered . The following chart shows the most used nameserver (registars).
  </p>
  <h5>Top 10 DNS NS domains</h5>
  <table class="full">
    <tbody>
      @php $opo =0;
      @endphp
      @foreach ($dns_ns as $dt)
      @php
      $per_ns = round(($dt->value / $sum14) * 100);
      @endphp
      <tr>
        <td>{{ $dt->name }}</td>
        <td><img style="position:relative; width:100px; height:15px;" src="{{public_path() . '/images/table_ns-' . $opo . '.png'}}" /></td>
        <td>{{ $dt->value }}</td>
        <td><b>{{ $per_ns }}%</b></td>
      </tr>
      @php  $opo++;
      @endphp
      @endforeach
    </tbody>
  </table>
  <br><br>

  <!--  page 10 -->
  <h4 id="title">WHOIS</h4>
  <p class="justify">
    The WHOIS (~who is) database contains the registration information for internet resources such as domain names. WHOIS informataion has limited availability via registrars and registries. Dataprovider.com has the WHOIS records for many domains, but not all of them. 
  </p>
  <h4 id="title">WHOIS coverage</h4>
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_8.png'}}" />
  <p class="left">Yes</p>
  <p class="right">No</p>
  <h4 id="title">Privacy protection</h4>
  <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_priv.png'}}" />
  <table id="content">
    @php $z3012 =0;
    @endphp
    @foreach ($privacy as $dt)
    @php
    $pr_priv = round(($dt->value / $sum0y) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $z3012 . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $pr_priv }}%</b></td>
    </tr>
    @php  $z3012++;
    @endphp
    @endforeach
    <tr>
      <td id="paragraf" colspan="4"><p class="justify">
        Most domain names registered through a registrar require the collection of essential contact information, such as the registrant's name, email adress, mailing address, phone number etc. This information is used in case dispute arises about the domain name. This information is displayed in the global whois system which is public and can be viewed by anyone. if you would like to keep your contact information private for a domain then ou can use a WHOIS privacy service like WhoisGuard, Domains by Proxy or Whois agent. Not every registrant fills out all his information . The following chart shows the completeness of the available  WHOIS information.
      </p></td>
    </tr>
  </table>
  <h4 id="title">Completeness</h4>
  <table class="full">
    <tbody>
      @php
      $mv = 0;
      @endphp
      @foreach ($complet as $dt)
      @php
      $val[$mv] = $dt->value;
      $per[$mv] = round($val[$mv] /1000);
      @endphp
      <tr>
        <td>{{ $dt->name }}</td>
        <td><img style="position:relative; width:100px; height:15px;" src="{{public_path() . '/images/table_com-' . $mv . '.png'}}" /></td>
        <td>{{ $dt->value }}</td>
        <td><b>{{ $per[$mv] }}%</b></td>
      </tr>
      @php
      $mv++;
      @endphp
      @endforeach
    </tbody>
  </table>
  <br><br>

  <!--  page 11 -->
  <h4 id="title">SSL</h4>
  <p class="justify">
    SSL (Secure Sockets Layers) is a security technology that encrypts communication between a browser and a server. You can recognize if a website uses SSL by checking if there is a small green lock in the address bar.
  </p>
  <p class="justify">
    SSl certificates are utilized by millions of online bussinesses and individuals to decrease the risk of sensitive information being stolen or tempered with by hackers or identify thieves.
  </p>
  <h4 class="bold">SSL enabled</h4>
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_9.png'}}" />
  <p class="left">Yes</p>
  <p class="right">No</p>
  <p class="justify">
    When we index a website we always start by resolving the hostname. we check if there is a valid response and obtain the IP address. We use this IP address to setup  an SSL connection betwen the crawler and the server. After authentication the spider retrieves all the SSL certificate information such as the SSL type, issuer organization, and expiration dates.
  </p>
  <h4 class="bold">SSL types</h4>
  <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_ssl.png'}}" />
  <table id="content">
    @php $ol =0;
    @endphp
    @foreach ($ssl as $dt)
    @php
    $per_ssl = round(($dt->value / $sum15) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $ol . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $per_ssl }}%</b></td>
    </tr>
    @php  $ol++;
    @endphp
    @endforeach
    <tr>
      <td id="paragraf" colspan="4"><p class="justify">
        There are 3 type of certificate available: Domain validation, Organization Validation, and Extended validation . Domain validation is default. 
      </p></td>
    </tr>
  </table>
  <br><br>

  <!-- page 12 -->
  <h4 class="bold">Privacy sensitive websites using SSL</h4>
  <p class="justify">
    privacy sensitive websites are websites  that store personal information such as contact or payment details. Websites that offer the possibility to create an account, log into a system, fill in a contact form or process a payment are examples of privacy sensitive websites. these websites should have an SSL certificate installed and transmit the information via https. The following chart shows how many privacy sensitive websites have SSL installed. 
  </p>
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_10.png'}}" />
  <p class="left">Yes</p>
  <p class="right">No</p>
  <br><br>
  <h4 class="bold">SSL issuer organization</h4>
  <p class="justify">
    The certificate issuer organization is responsible for delivering the certificate to a website . An SSL certificate is a digital certificate that authenticates the identity of a website and encrypts information sent. These certificates can only be issued by a certificate Authority . The following chart shows the top issuer organization.
  </p>
  <h5>Top 10 SSL issuer organization</h5>
  <table class="full">
    <tbody>
      @php $iui =0;
      @endphp
      @foreach ($issue as $dt)
      @php
      $per_iss = round(($dt->value / $sum16) * 100);
      @endphp
      <tr>
        <td>{{ $dt->name }}</td>
        <td><img style="position:relative; width:100px; height:15px;" src="{{public_path() . '/images/table_ssl-' . $iui . '.png'}}" /></td>
        <td>{{ $dt->value }}</td>
        <td><b>{{ $per_iss }}%</b></td>
      </tr>
      @php  $iui++;
      @endphp
      @endforeach
    </tbody>
  </table>
  <br><br>

  <!--  page 13 -->
  <h4 class="bold">Content</h4>
  <p class="justify">
    if there is a website available on the domain the Dataprovider.com indexes 10-20 pages of each website . Using this content we can identity language country, size of the website and the use of social media.
  </p>
  <h4 class="bold">Language</h4>
  <table id="table_left">
    @php $ol =0;
    @endphp
    @foreach ($ssl as $dt)
    @php
    $per_ssl = round(($dt->value / $sum15) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $ol . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $per_ssl }}%</b></td>
    </tr>
    @php  $ol++;
    @endphp
    @endforeach
  </table>
  <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/cake_lang.png'}}" class="image_right" />
  <p class="justify" style="position: relative; clear: both;">
    We currently recognize languages from 50 different countries. Our crawler determines the language of a website by using an n-gram model. An n-gram is a contiguous sequence of n items from a given sequence of text or speech. An n-gram model models sequences, notably natural languages, using the statistical properties of n-gram. The chart above shows the top there detected languages.
  </p>
  <h4 id="title">Countries</h4>
  <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/bar_3.png'}}" />
  <table id="content">
    @php $dx =0;
    @endphp
    @foreach ($countries as $dt)
    @php
    $per_co = round(($dt->value / $sum18) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $dx . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $per_co }}%</b></td>
    </tr>
    @php  $dx++;
    @endphp
    @endforeach
  </table>
  <p class="justify">
    Country refers to the land where the website is located or where the website originated from. We determine the country of a website based on multiple variables such as hosting country. language on the website , top-level domain and contact details.
  </p>
  <br>
  <h4 id="title">Pages per website</h4>
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_11.png'}}" />
  <table id="table_left">
    @php $dx1 =0;
    @endphp
    @foreach ($page as $dt)
    @php
    $per_pg = round(($dt->value / $sum19) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $dx1 . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $per_pg }}%</b></td>
    </tr>
    @php  $dx1++;
    @endphp
    @endforeach
  </table>
  <p class="justify">
    Pages refers to the estimated amount of pages a website contains. it is accurate up to 500 pages, which means larger website are indexed at 500 pages. We review the internal links to provide an etimation of the amount of pages a website contains.
  </p>
  <br><br>

  <!-- page 14 -->
  <h4 id="title">Social Media</h4>
  <p class="justify">
    Many people and companies use social media these days. Social media allows individuals to interact with one another, exchanging details about their lives such as biographical data, professional information, personal photos and up-to-the-minute thoghts. Website use social media to interact with their (potential) customers.
  </p>
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_12.png'}}" />

  <h6 class="left">Yes</h6>
  <h6 class="right">No</h6>
  <h4 id="title">Social media per website type</h4>
  <img style="position:relative; width:200px; height:200px;" src="{{public_path() . '/images/bar_4.png'}}" />
  <table id="content">
    @php $cvx =0;
    @endphp
    @foreach ($social_type as $dt)
    @php
    $per_typ3 = round(($dt->value / $sum21) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $cvx . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $per_typ3 }}%</b></td>
    </tr>
    @php  $cvx++;
    @endphp
    @endforeach
  </table>
  <p class="justify">
    The usage of social media differs per website type. Bussines and eCommerce websites tend to have a higher penetration of social media because they use social media to engage with their audience. The chart above shows the penetration of different platforms for each website type.
  </p>
  <h4 id="title">Social media platforms</h4>
  <img style="position:relative; width:100%; height:30px;" src="{{public_path() . '/images/span_13.png'}}" />
  <table id="table_left">
    @php $cv =0;
    @endphp
    @foreach ($social_media as $dt)
    @php
    $per_social = round(($dt->value / $sum20) * 100);
    @endphp
    <tr>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-' . $cv . '.png'}}" /></td>
      <td>{{ $dt->name }}</td>
      <td>{{ $dt->value }}</td>
      <td><b>{{ $per_social }}%</b></td>
    </tr>
    @php  $cv++;
    @endphp
    @endforeach
  </table>
  <p class="justify">
    This chart shows the available social media platforms that are found on the homepages of available website. There are many social media platforms available like Facebook, Twiter, and Linkedin. we determine the social media platform based upon the domain name in the social media profile.
  </p>
</div> <!-- container -->
</body>
</html>
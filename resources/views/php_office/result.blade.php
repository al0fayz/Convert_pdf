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
      <td id="one"></td>
      <td><b>Domains</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td><b>Active</b></td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td><b>Not active</b></td>
    </tr>
    @foreach($regis  as $dt)
    <tr>
      <td> {{ $dt->hosting }} </td>
      <td id="one"></td>
      <td> {{ $dt->domains }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-0.png'}}" /></td>
      <td> {{ $dt->active }} </td>
      <td id="one"><img style="position:relative; width:10px; height:10px;" src="{{public_path() . '/images/sp-1.png'}}" /></td>
      <td> {{ $dt->not_active }} </td>
    </tr>
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
        @foreach ($sub as $dt)
        @php
        $pr_s = round(($dt->value / $sum10) * 100);
        @endphp
        <tr>
          <td>{{ $dt->name }}</td>
          <td></td>
          <td>({{ $dt->value }})</td>
          <td><b>{{ $pr_s }}%</b></td>
        </tr>
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

    </table>
    <h4 id="title">DNS TXT</h4>
    <p class="paragraf">
      Dataprovider.com does not only index the website, we also index the DNS records. For each domain we collect the A(IPv4), AAAA coverage of these records in the zone file. 
    </p>
    <table>
      <tbody>

      </tbody>
    </table>
    <h4 id="title">Top 5 MX domians</h4>
    <table class="full">
      <tbody>

      </tbody>
    </table>
    <br><br>

    <!-- page 9 -->
    <h4 id="title">DNS AAAA records IPV6</h4>
    <p class="justify">
      Every device on the internet is assigned a unique IP. with the rapid growth of the internet in the 1990s, it became evident that far more address would be needed to connect devices than the IPV4 address spaced had available. IPV6 was to deal with the longanticipated problem of IPv4 address exhaustion . IPv6 is intented to replace IPv4. Not many devices make use of IPv6 yet. The following chart show the availibility of IPv6. 
    </p>
    <img src="images/canvas8.png" alt="image" class="image2">
    <h4 id="title">DNS NS(Nameserver)</h4>
    <p class="justify">
      The NS record (nameserver) is a computer that is permanently connected to the internet and translates domain names into IP address. it contains the DNS of domain with all IP address that belong to that domain. Mostly the NS record contains a hostname of the register were the domain is registered . The following chart shows the most used nameserver (registars).
    </p>
    <table class="full">
      <tbody>

      </tbody>
    </table>
  </div> <!-- container -->
</body>
</html>
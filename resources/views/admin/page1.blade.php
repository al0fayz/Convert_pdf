@extends('admin.layout')
@section('content')

     <!--  <nav class="navbar navbar-default bg-master-lighter sm-padding-10 full-width p-t-0 p-b-0" role="navigation">
        <div class="container-fluid full-width">
          <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle collapsed btn btn-link no-padding" data-toggle="collapse" data-target="#sub-nav">
              <i class="pg pg-more v-align-middle"></i>
            </button>
          </div>
          
          <div class="collapse navbar-collapse" id="sub-nav">
            <div class="row">
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                <ul class="navbar-nav d-flex flex-row">
                  <li class="nav-item"><a href="/report_print">Open</a></li>
                  <li class="nav-item"><a href="/report_print" id="click" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="fa fa-print"></i></a></li>
                  <li class="nav-item"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="fa fa-download"></i></a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <ul class="navbar-nav d-flex flex-row justify-content-sm-end">
                  <li class="nav-item">
                    <a href="/report_print" class="p-r-10"><img width="25" height="25" alt="" class="icon-pdf" data-src-retina="assets/img/invoice/pdf2x.png" data-src="assets/img/invoice/pdf.png" src="assets/img/invoice/pdf2x.png"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="p-r-10" id="save"><img width="25" height="25" alt="" class="icon-image" data-src-retina="assets/img/invoice/image2x.png" data-src="assets/img/invoice/image.png" src="assets/img/invoice/image2x.png"></a>
                  </li>
                  <li class="nav-item">
                    <a href="/save" class="p-r-10"><img width="25" height="25" alt="" class="icon-doc" data-src-retina="assets/img/invoice/doc2x.png" data-src="assets/img/invoice/doc.png" src="assets/img/invoice/doc2x.png"></a>
                  </li>
                  <li class="nav-item"><a href="#" class="p-r-10" onclick="$.Pages.setFullScreen(document.querySelector('html'));"><i class="fa fa-expand"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav> -->
      <!-- START CONTAINER FLUID -->
      <!-- START card -->
      <div class=" container-fluid   container-fixed-lg">
        <div class="card card-transparent">
          <div class="invoice padding-50 sm-padding-10">
            <div class="pull-left">
              <h2 class="bold">Zone File Respone</h2>
            </div>
            <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div>
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p>
              In November we've analyzed 94,020 domains with our crawlers, The results from that crawl are used to generate this report. Not every domain contains a website. This chapter gives insights into the responses of the domains.
            </p>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>Response</b>
            </div>
            <div class="card-controls">
              <ul>
                <li><a href="#" class="card-collapse" data-toggle="collapse"><i
                  class="pg-arrow_maximize"></i></a>
                </li>
                <li><a href="#" class="card-refresh" data-toggle="refresh"><i class="pg-refresh_new"></i></a>
                </li>
                <li><a href="#" class="card-close" data-toggle="close"><i class="pg-close"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body d-flex flex-wrap">
            <div class="col-lg-4 no-padding">
              <div class="card card-transparent">
                <div class="card-body">
                  <!-- <canvas id="myChart"></canvas> -->
                  {!! $chartjs1->render() !!}
                </div>
              </div>
            </div>
            <div class="col-lg-8 sm-no-padding">
              <table class="table_new">
                <tbody>
                  @php $a=0; @endphp
                  @foreach ($response as $key => $val1)
                  @php $per1 = round(($val1->value/$sum1)*100 ); @endphp
                  <tr>
                    <td><div class="span-{{$a}}"></td>
                      <td>{{ $val1->name }}</td>
                      <td>{{ $val1->value }}</td>
                      <td><b>{{ $per1 }}%</b></td>
                    </tr>
                    @php  $a++; @endphp
                    @endforeach
                  </tbody>
                </table>

                <p class="justify">When we Index a domain there can be four type of response. If a domain name is 'available' it means that we have
                  received a valid response with status code 1xx or 2xx . A domain can also result in a 'host not found' response . This
                  means there is no IP configured in the DNS for this domain . If the response is a 'redirect' then we received a service side redirect with status code 
                  3xx. The last response type is an 'Access denied', this means the crawler could not access the website and recieved status
                  code 4xx, 5xx, or 9xx. The following paragraph gives more details about the cause of the access denied.
                </p>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->

          <!-- START CONTAINER FLUID -->
          <!-- <div class=" container-fluid   container-fixed-lg"> -->
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header  ">
                <div class="card-title bold"><b>Access Denied</b>
                </div>
              </div>
              <div class="card-body d-flex flex-wrap">
                <div class="col-lg-12 no-padding">
                  <div class="p-r-30">
                    <br>
                    <p clas="justify">
                      An 'Access denied' means that the crawler can't access the website. This can occur when the DNS is not configured, the server is unavailable or access is not allowed. in most cases there is no website (DNS is not configured) but sometimes there is, in that case the hosting 
                      provider, Webmaster or CMS of the website doesn't allow the crawler to visit the website. if a domain result in an Access denied the 'Status Code' explains why access was denied. In the following chart you can see the top 5 reasons why some domains resulted in an access denied. 
                    </p>
                    <br>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="card card-transparent">
                    <div class="card-header  ">
                      <div class="card-controls">
                        <ul>
                          <li><a href="#" class="card-collapse" data-toggle="collapse"><i
                            class="pg-arrow_maximize"></i></a>
                          </li>
                          <li><a href="#" class="card-refresh" data-toggle="refresh"><i
                            class="pg-refresh_new"></i></a>
                          </li>
                          <li><a href="#" class="card-close" data-toggle="close"><i
                            class="pg-close"></i></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="myChart1" class="canvas"></canvas>
                      <table class="table_new">
                        <tbody>
                          @php $b=0; @endphp
                          @foreach ($access as $key => $val2)
                          @php $per2 = round(($val2->value/$sum2)*100 ); @endphp
                          <tr>
                            <td><div class="span-{{$b}}"></div></td>
                            <td>{{ $val2->code }}</td>
                            <td>{{ $val2->value }}</td>
                            <td><b>{{ $per2 }}%</b></td>
                            <td>{{ $val2->name }}</td>
                          </tr>
                          @php  $b++; @endphp
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!--   </div> content -->
          <!-- END CONTAINER FLUID -->

          @stop
          @section('script')
          <script>

    // var ctx = document.getElementById("myChart").getContext('2d');
    
    // var myChart = new Chart(ctx, {
    //   type: 'doughnut',
    //   data: {
    //     datasets: [{
    //       data: [9,9],
    //       backgroundColor: [
    //       '#33ccff',
    //       '#28a745',
    //       '#ff9933',
    //       ],
    //       labels: [
    //       'Available',
    //       'Access denied',
    //       'Redirect',
    //       ],
    //     }],
    //     labels: [
    //     'Available',
    //     'Access denied',
    //     'Redirect',
    //     ],
    //   },
    //   options: {
    //     responsive: true,
    //     legend: {
    //       display: false,
    //     },
    //   }
    // });
    var url = "{{url('chart/data')}}";
    var value = new Array();
    var Name = new Array();
    $(document).ready(function(){
      $.get(url, function(response){
        response.forEach(function(data){
          value.push(data.value);
          Name.push(data.name);
        });
      });
    });
    
    var  myCanvas= document.getElementById("myChart1");
    myCanvas.width = 1000;
    myCanvas.height = 30;
    // var myData = {
    //   "OK" : 70,
    //   "Forbidden" : 20, 
    //   "Website is disallowed b robots.txt." : 9, 
    //   "Unable to connect. (DNS contains invalid IP address)": 4, 
    //   "Not Found": 8  
    // };
    var sum = sum(value);
    var myData = value;
    console.log(sum);
    var ctx = myCanvas.getContext("2d");
    var myBarchart = new Barchart(
    {
      canvas:myCanvas,
      data:myData,
      colors:[
      '#33ccff',
      '#28a745',
      '#ff9933',
      '#cc0066',
      '#cc3300',
      ]
    }
    );
    myBarchart.draw();
    
    // $(document).ready(function(){
    //   // canvas1();s
    //   canvas2();
    // });
  //   canvas1 = function(){
  //     var canvas = document.getElementById('myChart');
  //     var data = canvas.toDataURL();
  //   // Send the screenshot to PHP to save it on the server
  //   $.ajax({
  //     type: "POST", 
  //     url: "/canvas1",
  //     dataType: 'text',
  //     data: { image: data, _token: '{{csrf_token()}}' },
  //     success: function (data) {
  //      console.log(data);
  //    },
  //    error: function (data, textStatus, errorThrown) {
  //     console.log(data);

  //   },
  // });
  // }
  // canvas2 = function(){
  //   var canvas = document.getElementById('myChart1');
  //   var data = canvas.toDataURL();
  //   // Send the screenshot to PHP to save it on the server
  //   $.ajax({
  //     type: "POST", 
  //     url: "/canvas2",
  //     dataType: 'text',
  //     data: { image: data, _token: '{{csrf_token()}}' },
  //     success: function (data) {
  //      console.log(data);
  //    },
  //    error: function (data, textStatus, errorThrown) {
  //     console.log(data);

  //   },
  // });
  // }
</script>
@endsection
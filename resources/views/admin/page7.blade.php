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
          <h2 class="bold">Subdomains</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              The subdomain refers to the first part of a domain. The most used subdomain in domain names is 'www' but there are also other subdomains, such as 'shop' or 'wiki'. The following chart shows how man domains use subdomains (other than www). 
            </p>
            <canvas id="myChart1" class="canvas"></canvas>
            <div class="pull-left sm-m-t-20">
              <h5>Yes (62,819) 79,3%</h5>
            </div>
            <div class="pull-right sm-m-t-20">
              <h5>No  (16.442) 20,7%</h5>
            </div>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>Distribution</b>
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
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-8 sm-no-padding">
              <div class="p-r-30">
                <table class="table-new">
                  <tbody>
                    <!-- <tr>
                      <td><span class="dot"></span>1</td>
                      <td>(32,404)</td>
                      <td><b>51,6%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot1"></span>2-10</td>
                      <td>(27,333)</td>
                      <td><b>43,5%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot2"></span>11-25</td>
                      <td>(2,286)</td>
                      <td><b>3,6%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot3"></span>26-100</td>
                      <td>(782)</td>
                      <td><b>1,2%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot4"></span> > 100 </td>
                      <td>(12)</td>
                      <td><b>0%</b></td>
                    </tr> -->
                    <ul class="list">
                      <?php foreach ($dis as $dt):  ?>
                        <li><p>{{ $dt->name }} {{ $dt->value }}</p></li>
                      <?php endforeach ?>
                    </ul>
                  </tbody>
                </table>
              </div>
              
              <p class="justify">
                The number of subdomains used by a website tells something about the size of the website. Big companies tend to have multiple subdomains. The following charts show how many subdomains website have if they use subdomains and what names the used most often for a subdomain. 
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
            <div class="card-header ">
              <div class="card-title bold"><b>Top 10 subdomains</b>
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
                </div>
              </div>
              <div class="col-lg-12 sm-no-padding">
                <div class="p-r-30">
                  <p class="justify">
                    In the following chart we display the top 10 subdomains and how many domains use that subdomain. The subdomain refers to the first part of a domain.
                  </p>
                  <table class="table-new">
                    <tbody>
                      <?php foreach ($sub as $dt): 
                      $per = round(($dt->value / $sum) * 100);
                       ?>
                        <tr>
                          <td> {{ $dt->name }}</td>
                          <td><div class="sp"><div class="satu"></div><div class="dua" style="width: {{ $per }}%;"></div></div></td>
                          <td> {{ $dt->value }}</td>
                          <td>{{ $per }}%</td>
                        </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END card -->
            </div>
          <!-- END CONTAINER FLUID -->
          @stop
          @section('script')
          <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                datasets: [{
                  data: [
                  62,
                  32,
                  4,
                  2,
                  0,
                  ],
                  backgroundColor: [
                  '#33ccff',
                  '#28a745',
                  '#ff9933',
                  ],
                  labels: [
                  'Content',
                  'Business',
                  'eCommerce',
                  'Blog',
                  'Forum',
                  ],
                }],
                labels: [
                'Content',
                'Business',
                'eCommerce',
                'Blog',
                'Forum',
                ],
              },
              options: {
                responsive: false,
                legend: {
                  display: false,
                },
                animation: false,
              }
            });
        // var ctx = document.getElementById("myChart2").getContext('2d');
        // var myChart = new Chart(ctx, {
        //   type: 'horizontalBar',
        //   data: {
        //     datasets: [{
        //       data: [
        //       21,
        //       13,
        //       5,
        //       4,
        //       4,
        //       4,
        //       4,
        //       4,
        //       3,
        //       3,
        //       ],
        //       backgroundColor: [
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       '#33ccff',
        //       ],
        //       labels: [
        //       'www',
        //       'mail',
        //       'sipp',
        //       'webmail',
        //       'blog',
        //       'elearning',
        //       'pmb',
        //       'ipse',
        //       'jdih',
        //       'perpustakaan',
        //       ],
        //     }],
        //     labels: [
        //     'www',
        //     'mail',
        //     'sipp',
        //     'webmail',
        //     'blog',
        //     'elearning',
        //     'pmb',
        //     'ipse',
        //     'jdih',
        //     'perpustakaan',
        //     ],
        //   },
        //   options: {
        //     responsive: true,
        //     legend: {
        //       display: false,
        //     },
        //     scales: {
        //       xAxes: [{
        //         gridLines: {
        //           display:false
        //         }
        //       }],
        //       yAxes: [{
        //         gridLines: {
        //           display:false
        //         }   
        //       }]
        //     }
        //   }
        // });

        var myCanvas = document.getElementById("myChart1");
        myCanvas.width = 1030;
        myCanvas.height = 30;
        var myData = {
          "Yes" : 14,
          "No" : 85
        };
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

          $(document).ready(function(){
            canvas1();
          });
          canvas1 = function(){
            var canvas = document.getElementById('myChart1');
            var data = canvas.toDataURL();
    // Send the screenshot to PHP to save it on the server
    $.ajax({
      type: "POST", 
      url: "/canvas6",
      dataType: 'text',
      data: { image: data, _token: '{{csrf_token()}}' },
      success: function (data) {
       console.log(data);
     },
     error: function (data, textStatus, errorThrown) {
      console.log(data);

    },
  });
  }
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
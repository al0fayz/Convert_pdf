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
  <!-- START card -->
  <div class=" container-fluid   container-fixed-lg">
    <div class="card card-transparent">
      <div class="invoice padding-50 sm-padding-10">
        <div class="card-title bold"><h3><b>Hosting</b></h3>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p>
              If a domain results in an actual website, parking page or placeholder then this website is hosted at a hosting company. This chapter gives insight in what companies these websites are hosted at, and in what countries.
            </p>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- END CONTAINER FLUID -->

        <!-- START CONTAINER FLUID -->
        <!-- <div class=" container-fluid   container-fixed-lg"> -->
          <!-- START card -->
          <div class="card card-transparent">
            <div class="card-header ">
              <div class="card-title bold"><b>Hosting company</b>
              </div>
            </div>
            <div class="card-body d-flex flex-wrap">
              <div class="col-lg-12 sm-no-padding">
                <div class="p-r-30">
                  <p class="justify">
                    The hosting company is also known as the AS company. This company is responsible for the network on which the website is hosted and owns the IP address the website is on. The hosting company corresponds with the assigned AS number . The following chart shows were most website are hosted and how many are developed.
                  </p>
                  <table class="table-new">
                    <thead>
                      <tr>
                        <th>Company</th>
                        <th><span class="dot"></span></th>
                        <th>Domains</th>
                        <th><span class="dot1"></span></th>
                        <th>Developed</th>
                        <th><span class="dot2"></span></th>
                        <th>Undeveloped</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>-Pt master web network</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                        <td><span class="dot2"></span></td>
                        <td><b>24,620(80%)</b></td>
                      </tr>
                      <tr>
                        <td>-Pt master web network</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                        <td><span class="dot2"></span></td>
                        <td><b>24,620(80%)</b></td>
                      </tr>
                      <tr>
                        <td>-Pt master web network</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                        <td><span class="dot2"></span></td>
                        <td><b>24,620(80%)</b></td>
                      </tr>
                      <tr>
                        <td>-Pt master web network</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                        <td><span class="dot2"></span></td>
                        <td><b>24,620(80%)</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- START card -->
          <div class="card card-transparent">
            <div class="card-header ">
              <div class="card-title bold"><b>Hosting country</b>
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
              <div class="col-lg-12 no-padding">
                <div class="card card-transparent">
                  <div class="card-body">
                    <canvas id="myChart1" class="canvas"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 sm-no-padding">
                <div class="p-r-30">
                  <table class="table-new">
                    <tbody>
                      <tr>
                        <td><span class="dot"></span>Indonesia</td>
                        <td>(8,469)</td>
                        <td><b>51,5%</b></td>
                      </tr>
                      <tr>
                        <td><span class="dot1"></span>United States</td>
                        <td>(7,75)</td>
                        <td><b>45,5%</b></td>
                      </tr>
                      <tr>
                        <td><span class="dot2"></span>Singapore</td>
                        <td>(486)</td>
                        <td><b>2,8%</b></td>
                      </tr>
                      <tr>
                        <td><span class="dot3"></span>Unknon</td>
                        <td>(30)</td>
                        <td><b>0,2%</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-lg-6 sm-no-padding">
                <p class="justify">
                  Hosting country refers to the country where the website is hosted. Our crawler determines the hosting country based on the IP Address of a website. The hosting country can differ from the country where the company behind the website is based.
                </p>
              </div>
            </div>
          </div>
            <!-- END card -->
        </div>
            <!-- END card -->
          </div>
        <!-- END CONTAINER FLUID -->
        @stop
        @section('script')
        <script>
          var myCanvas = document.getElementById("myChart1");
          myCanvas.width = 1030;
          myCanvas.height = 30;
          var myData = {
            "Indonesia" : 60,
            "United States" : 23,
            "Singapore" : 13,
            "Unknown" : 1,
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
          // var ctx = document.getElementById("myChart").getContext('2d');
          // var myChart = new Chart(ctx, {
          //   type: 'bar',
          //   data: {
          //     datasets: [{
          //       data: [
          //       47,
          //       41,
          //       2,
          //       2,
          //       2,
          //       ],
          //       backgroundColor: [
          //       '#33ccff',
          //       '#28a745',
          //       '#ff9933',
          //       ],
          //       labels: [
          //       '.com',
          //       '.id',
          //       '.eu',
          //       '.net',
          //       '.org',
          //       ],
          //     }],
          //     labels: [
          //     '.com',
          //     '.id',
          //     '.eu',
          //     '.net',
          //     '.org',
          //     ],
          //   },
          //   options: {
          //     responsive: true,
          //     legend: {
          //       display: false,
          //     },
          //   }
          // });

          $(document).ready(function(){
            canvas1();
          });
          canvas1 = function(){
            var canvas = document.getElementById('myChart1');
            var data = canvas.toDataURL();
    // Send the screenshot to PHP to save it on the server
    $.ajax({
      type: "POST", 
      url: "/canvas5",
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
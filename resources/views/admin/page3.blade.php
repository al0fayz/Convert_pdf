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
        <div class="card-title bold"><h3><b>Website redirect</b></h3>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              A redirect is a technique which can be used to redirect a domain to or URL, A redirect can be implemented 'server side' or 'client side' . A server side redirect is done b using a 3xx status code followed by the new destination . A client side redirect is done by using a piece of javascript or a META refresh . The crawler cannot execute javascript so onl detects server side redirect . The following chart show what TLD's are redirected b domains: 
            </p>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <!-- <div class="card-title bold"><b>Developed</b>
            </div> -->
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
            <div class="col-lg-6 no-padding">
              <div class="card card-transparent">
                <div class="card-body">
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 sm-no-padding">
              <div class="p-r-30">
                <table class="table-new">
                  <tbody>
                    <tr>
                      <td><span class="dot"></span>.com</td>
                      <td>(2,058)</td>
                      <td><b>47%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot1"></span>.id</td>
                      <td>(1,811)</td>
                      <td><b>41%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot2"></span>.eu</td>
                      <td>(91)</td>
                      <td><b>2%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot3"></span>.net</td>
                      <td>(81)</td>
                      <td><b>2%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot4"></span>.org</td>
                      <td>(80)</td>
                      <td><b>2%</b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
              <div class="card-title bold"><h3><b>Top 15 registrars</b></h3>
              </div>
            </div>
            <div class="card-body d-flex flex-wrap">
              <div class="col-lg-12 sm-no-padding">
                <div class="p-r-30">
                  <p class="justify">
                    In the following chart we display the top 15 registrars . it's not only the number of domains that is important to know but also how these domains are being used . The chart shows for each registrar how many domains the have and how man are actually avilable (contain a website ) and developed (higher is better).
                  </p>
                  <table class="table-new">
                    <thead>
                      <tr>
                        <th>Hosting </th>
                        <th><span class="dot"></span></th>
                        <th>Domains</th>
                        <th><span class="dot1"></span></th>
                        <th>Available</th>
                        <th><span class="dot2"></span></th>
                        <th>Developed</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                        <td><span class="dot2"></span></td>
                        <td><b>24,620(80%)</b></td>
                      </tr>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                        <td><span class="dot2"></span></td>
                        <td><b>24,620(80%)</b></td>
                      </tr>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                        <td><span class="dot2"></span></td>
                        <td><b>24,620(80%)</b></td>
                      </tr>
                      <tr>
                        <td>-Digital registra</td>
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
                  <div class="col-md-12 bg-master-darker">
                    <p>
                      Note <br>
                      In order to determine the register Dataprovider.com relies on the availability of WHOIS information that can have a deviation and a mapping between the DNS nameserver and registrars.
                    </p>
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
            type: 'bar',
            data: {
              datasets: [{
                data: [
                47,
                41,
                2,
                2,
                2,
                ],
                backgroundColor: [
                '#33ccff',
                '#28a745',
                '#ff9933',
                ],
                labels: [
                '.com',
                '.id',
                '.eu',
                '.net',
                '.org',
                ],
              }],
              labels: [
              '.com',
              '.id',
              '.eu',
              '.net',
              '.org',
              ],
            },
            options: {
              responsive: true,
              legend: {
                display: false,
              },
              scales: {
              xAxes: [{
                gridLines: {
                  display:false
                }
              }],
              yAxes: [{
                gridLines: {
                  display:false
                }   
              }]
            }
            }
          });

  //         $(document).ready(function(){
  //           canvas1();
  //           canvas2();
  //         });
  //         canvas1 = function(){
  //           var canvas = document.getElementById('myChart');
  //           var data = canvas.toDataURL();
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
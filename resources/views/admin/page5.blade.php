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
          <h2 class="bold">Reneal probability</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p>
              At Dataprovider.com we see milions of domains come online and go offline. we took features of these domains like their content, age, popularit and activity and created a model to predict if a domain will get renewed or not. We call this score the 'Reneal probability'. 
            </p>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>Reneal probability</b>
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
              </div>
            </div>
            <div class="col-lg-8 sm-no-padding">
              <div class="p-r-30">
                <table class="table-new">
                  <tbody>
                   <tr>
                    <td><span class="dot"></span>Low</td>
                    <td>(0)</td>
                    <td><b>0%</b></td>
                  </tr>
                  <tr>
                    <td><span class="dot1"></span>Medium</td>
                    <td>(16,046)</td>
                    <td><b>17%</b></td>
                  </tr>
                  <tr>
                    <td><span class="dot2"></span>High</td>
                    <td>(77,974)</td>
                    <td><b>82,9%</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <p class="justify">
              If a domain has a low reneal probability, then it is very likely the domain will drop within a year . Domain with a high renewal probability will most likely renew.
            </p>
          </div>
          <div class="col-lg-4 no-padding">
              <div class="card card-transparent">
                <div class="card-body">
                  <canvas id="myChart"></canvas>
                </div>
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
              <div class="card-title bold"><h3><b>Top 15 registrars with high renewal risk</b></h3>
              </div>
            </div>
            <div class="card-body d-flex flex-wrap">
              <div class="col-lg-12 sm-no-padding">
                <div class="p-r-30">
                  <p class="justify">
                    In the following chart we display the top 15 registrar and their renewal probability . It's not only the number of domains that is important to know, but also how many of these domains get renewad . The chart shows for each registrar how many domains they have and how many domains are probably not going to get renewed (higher is better).
                  </p>
                  <table class="table-new">
                    <thead>
                      <tr>
                        <th>Top 15 registrars</th>
                        <th><span class="dot"></span></th>
                        <th>Domains</th>
                        <th><span class="dot1"></span></th>
                        <th>Low renewal est.</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                      </tr>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                      </tr>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                      </tr>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                      </tr>
                      <tr>
                        <td>-Digital registra</td>
                        <td><span class="dot"></span></td>
                        <td>41,068</td>
                        <td><span class="dot1"></span></td>
                        <td><b>30,833(75%)</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
            0,
            17,
            83,
            ],
            backgroundColor: [
            '#33ccff',
            '#28a745',
            '#ff9933',
            '#cc0066',
            '#cc3300',
            '#ffff00',
            '#0000ff',
            ],
            labels: [
            'Available',
            'Access denied',
            'Redirect',
            ],
          }],
          labels: [
          'Available',
          'Access denied',
          'Redirect',
          ],
        },
        options: {
          responsive: true,
          legend: {
            display: false,
          },
        }
      });

      var myCanvas = document.getElementById("myChart1");
      myCanvas.width = 1000;
      myCanvas.height = 30;
      var myData = {
        "Active" : 73,
        "Not Active" : 27
      };
      var ctx = myCanvas.getContext("2d");
      var myBarchart = new Barchart(
      {
        canvas:myCanvas,
        data:myData,
        colors:[
        "#33ccff",
        '#28a745',
        '#ff9933',
        '#cc0066',
        "#cc3300",
        ]
      }
      );
      myBarchart.draw();

  //   $(document).ready(function(){
  //     canvas1();
  //     canvas2();
  //   });
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
  //     var data = canvas.toDataURL();
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
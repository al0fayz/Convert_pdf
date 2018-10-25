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
          <h2 class="bold">Content</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              if there is a website available on the domain the Dataprovider.com indexes 10-20 pages of each website . Using this content we can identity language country, size of the website and the use of social media.
            </p>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>Language</b>
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
            <div class="col-lg-8 sm-no-padding">
              <div class="p-r-30">
                <table class="table-new">
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
              
              <p class="justify">
                We currently recognize languages from 50 different countries. Our crawler determines the language of a website by using an n-gram model. An n-gram is a contiguous sequence of n items from a given sequence of text or speech. An n-gram model models sequences, notably natural languages, using the statistical properties of n-gram. The chart above shows the top there detected languages.
              </p>
            </div>
            <div class="col-lg-4 no-padding">
              <div class="card card-transparent">
                <div class="card-body">
                  <canvas id="myChart1"></canvas>
                </div>
              </div>
            </div>
          </div>
          <!-- END card -->
        </div>
        <!-- END CONTAINER FLUID -->
        <!-- END CONTAINER FLUID -->
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>Countries</b>
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
                  <canvas id="myChart2"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-8 sm-no-padding">
              <div class="p-r-30">
                <table class="table-new">
                  <tbody>
                  </tbody>
                </table>
              </div>
              
              <p class="justify">
                Country refers to the land where the website is located or where the website originated from. We determine the country of a website based on multiple variables such as hosting country. language on the website , top-level domain and contact details.
              </p>
            </div>
            <div class="col-lg-12 sm-no-padding">
              <h5 class="title">Pages per website</h5>
              <canvas id="myChart" class="canvas"></canvas>
              <p class="justify">
                Pages refers to the estimated amount of pages a website contains. it is accurate up to 500 pages, which means larger website are indexed at 500 pages. We review the internal links to provide an etimation of the amount of pages a website contains.
              </p>
          </div>
          <!-- END card -->
        </div>
        <!-- START CONTAINER FLUID -->
        <!-- <div class=" container-fluid   container-fixed-lg"> -->
        </div>
      <!-- END CONTAINER FLUID -->
      @stop
      @section('script')
      <script>
        var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            datasets: [{
              data: [
              62,
              33,
              3,
              0,
              0,
              ],
              backgroundColor: [
              '#33ccff',
              '#28a745',
              '#ff9933',
              '#cc0066',
              '#cc3300',
              ],
              labels: [
              'Indonesia',
              'English',
              'Italian',
              'German',
              'Portuguese'
              ],
            }],
            labels: [
            'Indonesia',
            'English',
            'Italian',
            'German',
            'Portuguese'
            ],
          },
          options: {
            responsive: true,
            legend: {
              display: false,
            },
          }
        });
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            datasets: [{
              data: [
              99,
              1,
              0,
              0,
              0,
              ],
              backgroundColor: [
              '#33ccff',
              '#28a745',
              '#ff9933',
              '#cc0066',
              '#cc3300',
              ],
              labels: [
              'ID',
              'US',
              'SG',
              'AU',
              'BR'
              ],
            }],
            labels: [
            'ID',
              'US',
              'SG',
              'AU',
              'BR'
            ],
          },
          options: {
            responsive: true,
            legend: {
              display: false,
            },scales: {
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
            },labels:{
              display: false
            }
          }
        });
        var myCanvas = document.getElementById("myChart");
        myCanvas.width = 1030;
        myCanvas.height = 30;
        var myData = {
          "Yes" : 21,
          "NO" : 78,
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

  //         $(document).ready(function(){
  //           canvas1();
  //         });
  //         canvas1 = function(){
  //           var canvas = document.getElementById('myChart');
  //           var data = canvas.toDataURL();
  //   // Send the screenshot to PHP to save it on the server
  //   $.ajax({
  //     type: "POST", 
  //     url: "/canvas11",
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
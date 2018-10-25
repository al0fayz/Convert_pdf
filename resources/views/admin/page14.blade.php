@extends('admin.layout')
@section('content')
  <!-- START CONTAINER FLUID -->
  <!-- START card -->
  <div class=" container-fluid   container-fixed-lg">
    <div class="card card-transparent">
      <div class="invoice padding-50 sm-padding-10">
        <div class="pull-left">
          <h2 class="bold">Social Media</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              Many people and companies use social media these days. Social media allows individuals to interact with one another, exchanging details about their lives such as biographical data, professional information, personal photos and up-to-the-minute thoghts. Website use social media to interact with their (potential) customers.
            </p>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>Social media per website</b>
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
                The usage of social media differs per website type. Bussines and eCommerce websites tend to have a higher penetration of social media because they use social media to engage with their audience. The chart above shows the penetration of different platforms for each website type.
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
                This chart shows the available social media platforms that are found on the homepages of available website. There are many social media platforms available like Facebook, Twiter, and Linkedin. we determine the social media platform based upon the domain name in the social media profile.
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
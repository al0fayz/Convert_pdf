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
          <h2 class="bold">SSL</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              SSL (Secure Sockets Layers) is a security technology that encrypts communication between a browser and a server. You can recognize if a website uses SSL by checking if there is a small green lock in the address bar.
            </p>
            <p class="justify">
              SSl certificates are utilized by millions of online bussinesses and individuals to decrease the risk of sensitive information being stolen or tempered with by hackers or identify thieves.
            </p>
            <h5 class="bold">SSL enabled</h5>
            <canvas id="myChart" class="cnvas"></canvas>
            <div class="pull-left sm-m-t-20">
              <p>Yes (62,819) 79,3%</p>
            </div>
            <div class="pull-right sm-m-t-20">
              <p>No  (16.442) 20,7%</p>
            </div>
            <br><br>
            <p class="justify">
              When we index a website we always start by resolving the hostname. we check if there is a valid response and obtain the IP address. We use this IP address to setup  an SSL connection betwen the crawler and the server. After authentication the spider retrieves all the SSL certificate information such as the SSL type, issuer organization, and expiration dates.
            </p>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>SSL types</b>
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
                  <canvas id="myChart1"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-8 sm-no-padding">
              <div class="p-r-30">
                <table class="table-new">
                  <tbody>
                    <tr>
                      <ul class="list">
                        <?php foreach ($ssl as $key => $dt):
                          $p = round(($dt->value /$sum) *100);
                         ?>
                        <li><p>{{ $dt->name }}  ({{ $dt->value }})<b>{{ $p }}%</b></p></li>
                      <?php endforeach ?>
                      </ul>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <p class="justify">
                There are 3 type of certificate available: Domain validation, Organization Validation, and Extended validation . Domain validation is default. 
              </p>
            </div>
          </div>
          <!-- END card -->
        </div>
        <!-- END CONTAINER FLUID -->
        <!-- END CONTAINER FLUID -->

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
              97,
              2,
              1,
              ],
              backgroundColor: [
              '#33ccff',
              '#28a745',
              '#ff9933',
              '#cc0066',
              '#cc3300',
              ],
              labels: [
              'Domain validation',
              'organization validation',
              'extended validation'
              ],
            }],
            labels: [
            'Domain validation',
            'organization validation',
            'extended validation'
            ],
          },
          options: {
            responsive: true,
            legend: {
              display: false,
            },
          }
        });
        var myCanvas = document.getElementById("myChart");
        myCanvas.width = 1030;
        myCanvas.height = 30;
        var myData = {
          "Yes" : 56,
          "NO" : 43,
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
            var canvas = document.getElementById('myChart');
            var data = canvas.toDataURL();
    // Send the screenshot to PHP to save it on the server
    $.ajax({
      type: "POST", 
      url: "/canvas10",
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
</script>
@endsection
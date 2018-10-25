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
        <div class="pull-left">
          <h2 class="bold">Privacy sensitive websites using SSL</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              privacy sensitive websites are websites  that store personal information such as contact or payment details. Websites that offer the possibility to create an account, log into a system, fill in a contact form or process a payment are examples of privacy sensitive websites. these websites should have an SSL certificate installed and transmit the information via https. The following chart shows how many privacy sensitive websites have SSL installed. 
            </p>
            <canvas id="myChart" class="cnvas"></canvas>
            <div class="pull-left sm-m-t-20">
              <p>Yes (62,819) 79,3%</p>
            </div>
            <div class="pull-right sm-m-t-20">
              <p>No  (16.442) 20,7%</p>
            </div>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>SSL issuer organization</b>
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
              <div class="p-r-30">
                <p>
                  The certificate issuer organization is responsible for delivering the certificate to a website . An SSL certificate is a digital certificate that authenticates the identity of a website and encrypts information sent. These certificates can only be issued by a certificate Authority . The following chart shows the top issuer organization.
                </p>
                <table class="table-new">
                  <tbody>
                    <?php foreach ($issue as $key => $vl): 
                    $per = round(($vl->value/ $sum)*100);
                    ?>
                    <tr>
                      <td>{{ $vl->name }}</td>
                      <td><div class="sp"><div class="satu"></div><div class="dua" style="width: {{ $per }}%;"></div></div></td>
                      <td>{{ $vl->value }}</td>
                      <td><b>{{ $per }}%</b></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
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
        // var ctx = document.getElementById("myChart1").getContext('2d');
        // var myChart = new Chart(ctx, {
        //   type: 'doughnut',
        //   data: {
        //     datasets: [{
        //       data: [
        //       97,
        //       2,
        //       1,
        //       ],
        //       backgroundColor: [
        //       '#33ccff',
        //       '#28a745',
        //       '#ff9933',
        //       '#cc0066',
        //       '#cc3300',
        //       ],
        //       labels: [
        //       'Domain validation',
        //       'organization validation',
        //       'extended validation'
        //       ],
        //     }],
        //     labels: [
        //     'Domain validation',
        //     'organization validation',
        //     'extended validation'
        //     ],
        //   },
        //   options: {
        //     responsive: true,
        //     legend: {
        //       display: false,
        //     },
        //   }
        // });
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

          $(document).ready(function(){
            canvas1();
          });
          canvas1 = function(){
            var canvas = document.getElementById('myChart');
            var data = canvas.toDataURL();
    // Send the screenshot to PHP to save it on the server
    $.ajax({
      type: "POST", 
      url: "/canvas11",
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
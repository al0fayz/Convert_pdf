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
          <h2 class="bold">DNS AAAA records IPV6</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              Every device on the internet is assigned a unique IP. with the rapid growth of the internet in the 1990s, it became evident that far more address would be needed to connect devices than the IPV4 address spaced had available. IPV6 was to deal with the longanticipated problem of IPv4 address exhaustion . IPv6 is intented to replace IPv4. Not many devices make use of IPv6 yet. The following chart show the availibility of IPv6.  
            </p>
            <canvas id="myChart" class="cnvas"></canvas>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <!-- END CONTAINER FLUID -->

        <!-- START CONTAINER FLUID -->
        <!-- <div class=" container-fluid   container-fixed-lg"> -->
          <!-- START card -->
          <div class="card card-transparent">
            <div class="card-header ">
              <div class="card-title bold"><b>DNS NS(Nameserver)</b>
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
                    The NS record (nameserver) is a computer that is permanently connected to the internet and translates domain names into IP address. it contains the DNS of domain with all IP address that belong to that domain. Mostly the NS record contains a hostname of the register were the domain is registered . The following chart shows the most used nameserver (registars).
                  </p>
                  <table class="table-new">
                  <tbody>
                    <?php foreach ($dns_ns as $key => $dt):
                    $per = round(($dt->value / $sum) *100);
                    ?>
                    <tr>
                      <td>{{ $dt->name }}</td>
                      <td><div class="sp"><div class="satu"></div><div class="dua" style="width: {{ $per }}%;"></div></div></td>
                      <td>{{ $dt->value }}</td>
                      <td><b>{{ $per }}%</b></td>
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
        // var ctx = document.getElementById("myChart").getContext('2d');
        // var myChart = new Chart(ctx, {
        //   type: 'bar',
        //   data: {
        //     datasets: [{
        //       data: [
        //       51,
        //       87,
        //       95,
        //       3,
        //       ],
        //       backgroundColor: [
        //       '#33ccff',
        //       '#28a745',
        //       '#ff9933',
        //       '#cc0066',
        //       '#cc3300',
        //       ],
        //       labels: [
        //       'DNS TXT',
        //       'DNS MX',
        //       'DNS NS',
        //       'DNS SEC',
        //       ],
        //     }],
        //     labels: [
        //     'DNS TXT',
        //     'DNS MX',
        //     'DNS NS',
        //     'DNS SEC',
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

        var myCanvas = document.getElementById("myChart");
        myCanvas.width = 1030;
        myCanvas.height = 30;
        var myData = {
          "Yes" : 6,
          "NO" : 94,
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
      url: "/canvas8",
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
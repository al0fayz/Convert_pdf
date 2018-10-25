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
          <h2 class="bold">Available</h2>
        </div>
            <!-- <div class="pull-right sm-m-t-20">
              <h5>Powered By dataprovider.com</h5>
            </div> -->
          </div>
          <div class="col-lg-12 col-sm-height sm-no-padding">
            <p class="justify">
              When a domain result in an actual website we say the response is available. We have not looked at the actual content et. The content of a domain is important for reneals. A domain that is available can be 'developed' or 'undeveloped' . A developed website is a ebsite that contains real, manually created content. Somebody took time and effort to create this website . The opposite is an undeveloped website . This is q website that contain a placeholder (default page from the registar), is paked . Contains almost no content or shows the content from another website(frame).
            </p>
            <canvas id="myChart2" class="canvas"></canvas>
            <div class="pull-left sm-m-t-20">
              <h5>Developed (62,819) 79,3%</h5>
            </div>
            <div class="pull-right sm-m-t-20">
              <h5>Undeveloped  (16.442) 20,7%</h5>
            </div>
          </div>
        </div>
      </div>
      <div class=" container-fluid   container-fixed-lg">
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-header ">
            <div class="card-title bold"><b>Developed</b>
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
                  {!! $chartjs2->render() !!}
                </div>
              </div>
            </div>
            <div class="col-lg-8 sm-no-padding">
              <div class="p-r-30">
                <table class="table-new">
                  <tbody>
                    <tr>
                      <td><span class="dot"></span>Content</td>
                      <td>(32,404)</td>
                      <td><b>51,6%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot1"></span>Business</td>
                      <td>(27,333)</td>
                      <td><b>43,5%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot2"></span>eCommerce</td>
                      <td>(2,286)</td>
                      <td><b>3,6%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot3"></span>Blog</td>
                      <td>(782)</td>
                      <td><b>1,2%</b></td>
                    </tr>
                    <tr>
                      <td><span class="dot4"></span>Forum</td>
                      <td>(12)</td>
                      <td><b>0%</b></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <p class="justify">A developed ebsite is a website that contains real, manually created content . somebody took time and effort in creating this website. Developed website are good for renewals. when we index the website we look at the content and classify it. if our craler is able to identify features like a company name, phone number and adress then we classify it as a 'Bussiness' website . If the website offers the possibility to buy products or services on it we call it 'e-Commerce'. A website classified as 'content' is mostly a personal website sometimes websites also fullfill a special task like a blog or a forum.  
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
              <div class="card-title bold"><b>Undeveloped</b>
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
                    <!-- <canvas id="myChart1"></canvas> -->
                    {!! $chartjs3->render() !!}
                  </div>
                </div>
              </div>
              <div class="col-lg-8 sm-no-padding">
                <div class="p-r-30">
                  <table class="table-new">
                    <tbody>
                      <tr>
                        <td><span class="dot"></span>Placeholder</td>
                        <td>(8,469)</td>
                        <td><b>51,5%</b></td>
                      </tr>
                      <tr>
                        <td><span class="dot1"></span>Low Content</td>
                        <td>(7,75)</td>
                        <td><b>45,5%</b></td>
                      </tr>
                      <tr>
                        <td><span class="dot2"></span>Framed</td>
                        <td>(486)</td>
                        <td><b>2,8%</b></td>
                      </tr>
                      <tr>
                        <td><span class="dot2"></span>Parking</td>
                        <td>(30)</td>
                        <td><b>0,2%</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <p class="justify">An undevelop website is a website that contains a placeholder (default page from the registrar), is parked , has almost no content or shows the content of another website  (frame). An undeveloped website is not good for renewals . if people didn't take the effort to put a website on the domain, then the chance of a domain being renewad is lower. 
                </p>
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
          //   type: 'doughnut',
          //   data: {
          //     datasets: [{
          //       data: [
          //       52,
          //       43,
          //       4,
          //       1,
          //       0,
          //       ],
          //       backgroundColor: [
          //       '#33ccff',
          //       '#28a745',
          //       '#ff9933',
          //       ],
          //       labels: [
          //       'Content',
          //       'Business',
          //       'eCommerce',
          //       'Blog',
          //       'Forum',
          //       ],
          //     }],
          //     labels: [
          //     'Content',
          //     'Business',
          //     'eCommerce',
          //     'Blog',
          //     'Forum',
          //     ],
          //   },
          //   options: {
          //     responsive: false,
          //     legend: {
          //       display: false,
          //     },
          //     animation: false,
          //   }
          // });var ctx = document.getElementById("myChart1").getContext('2d');
          // var myChart = new Chart(ctx, {
          //   type: 'doughnut',
          //   data: {
          //     datasets: [{
          //       data: [
          //       51,
          //       46,
          //       3,
          //       0,
          //       ],
          //       backgroundColor: [
          //       '#33ccff',
          //       '#28a745',
          //       '#ff9933',
          //       '#cc0066',
          //       '#cc3300',
          //       ],
          //       labels: [
          //       'Placeholder',
          //       'Low Content',
          //       'Framed',
          //       'Parking',
          //       ],
          //     }],
          //     labels: [
          //     'Placeholder',
          //     'Low Content',
          //     'Framed',
          //     'Parking',
          //     ],
          //   },
          //   options: {
          //     responsive: false,
          //     legend: {
          //       display: false,
          //     },
          //     animation: false,
          //   }
          // });

          var myCanvas = document.getElementById("myChart2");
          myCanvas.width = 1030;
          myCanvas.height = 30;
          var myData = {
            "Developed" : 79,
            "Undeveloped" : 20
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
    //       //mengirim chart dengan ajax menjadi image
    //       $(document).ready(function(){
    //         var canvas = document.getElementById('myChart2');
    //         var data = canvas.toDataURL();
    // // Send the screenshot to PHP to save it on the server
    //       $.ajax({
    //         type: "POST", 
    //         url: "/canvas3",
    //         dataType: 'text',
    //         data: { image: data, _token: '{{csrf_token()}}' },
    //         success: function (data) {
    //          console.log(data);
    //        },
    //        error: function (data, textStatus, errorThrown) {
    //         console.log(data);

    //       },
    //     });
    //   });
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
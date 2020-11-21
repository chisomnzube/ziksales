@extends('layouts.dashboard')
@section('head')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="msapplication-tap-highlight" content="no"/>
  <!-- Font & Icon -->
  <link rel="stylesheet" href="../../agent/font/inter/inter.min.css">
  <link href="../../agent/plugins/material-design-icons-iconfont/material-design-icons.min.css" rel="stylesheet">
  <link href="../../agent/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Plugins -->
  <!-- CSS plugins goes here -->
  <!-- Main Style -->
  <link rel="stylesheet" href="../../agent/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="../agent/css/style.min.css" id="main-css">
  <link rel="stylesheet" href="../agent/css/sidebar-gray.min.css" id="theme-css"> <!-- options: blue,cyan,dark,gray,green,pink,purple,red,royal,ash,crimson,namn,frost -->
  <title>Dashboard - Agent Portal | {{config('app.name')}}</title>
</head>
@endsection
@section('main-content')

    <!-- Main body -->
    <div class="main-body">
      @include('inc.messages')

      <div class="row gutters-sm">

         <!-- Page Likes -->
        <div class="col-sm-6 col-xl-3 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="flex-center justify-content-start mb-2">
                <i data-feather="thumbs-up" class="mr-2 font-size-lgs"></i>
                <h3 class="card-title mb-0 mr-auto">Today</h3>
                <span id="pageLikes">400,200,300</span>
              </div>
              <h6 class="text-info">Today's Analysis</h6>
              <p class="small text-secondary mb-0">Total Sales = {{$todayTotal}}</p>
              <p class="small text-secondary mb-0">Total Cash = &#8358;{{ number_format( $todayProfit) }} </p>
            </div>
          </div>
        </div>
        <!-- Page /Likes -->

        <!-- Connections -->
        <div class="col-sm-6 col-xl-3 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="flex-center justify-content-start mb-2">
                <i data-feather="link" class="mr-2 font-size-lgs"></i>
                <h3 class="card-title mb-0 mr-auto">This Week</h3>
                <span id="connections">10,200,400,500,300</span>
              </div>
              <h6 class="text-primary">Weekly Analysis</h6>
              <p class="small text-secondary mb-0">Total Sales = {{$weekTotal}}</p>
              <p class="small text-secondary mb-0">Total Cash = &#8358;{{ number_format($weekProfit) }} </p>
            </div>
          </div>
        </div>
        <!-- /Connections -->

        <!-- Your Articles -->
        <div class="col-sm-6 col-xl-3 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="flex-center justify-content-start mb-2">
                <i data-feather="book" class="mr-2 font-size-lgs"></i>
                <h3 class="card-title mb-0 mr-auto">This Month</h3>
                <span id="yourArticles">10,400,200,500,300</span>
              </div>
              <h6 class="text-danger">Monthly Analysis</h6>
              <p class="small text-secondary mb-0">Total Sales = {{$monthTotal}}</p>
              <p class="small text-secondary mb-0">Total Cash = &#8358;{{ number_format($monthProfit) }} </p>
            </div>
          </div>
        </div>
        <!-- Your /Articles -->

        <!-- Your Photos -->
        <div class="col-sm-6 col-xl-3 mb-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="flex-center justify-content-start mb-2">
                <i data-feather="image" class="mr-2 font-size-lgs"></i>
                <h3 class="card-title mb-0 mr-auto">This Year</h3>
                <span id="yourPhotos">10,200,400,300,500</span>
              </div>
              <h6 class="text-success">Yearly Analysis</h6>
              <p class="small text-secondary mb-0">Total Sales = {{$yearTotal}}</p>
              <p class="small text-secondary mb-0">Total Cash = &#8358;{{ number_format( $yearProfit) }} </p>
            </div>
          </div>
        </div>
        <!-- Your /Photos -->

               <!-- Website Audience Metrics -->
        <div class="col-xl-7 mb-3">
          <div class="card h-100">
            <div class="card-header border-0">
              <h6>Total Revenue per month for the Year {{date('Y')}}</h6>
              
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-xl-12 mb-3" style="height: 300px">
                  <canvas id="websiteAudienceMetrics"></canvas>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /Website Audience Metrics -->

        <!-- FILL AREA -->
        <div class="col-md-5 col-xl-5 mb-3">
          <div class="card">
            <div class="card-header">
              Total Sales per month for year {{date('Y')}}
              <button type="button" data-action="fullscreen" class="btn btn-sm btn-text-secondary btn-icon rounded-circle ml-auto">
                <i class="material-icons">fullscreen</i>
              </button>
            </div>
            <div class="card-body" style="height: 300px">
              <canvas id="line-chart-fill"></canvas>
            </div>
          </div>
        </div>
        <!-- /FILL AREA -->

        
        

      </div>

    </div>
    <!-- /Main body -->
@endsection
  @section('script')

  <!-- Main Scripts -->
  <script src="../agent/js/jquery.min.js"></script>
  <script src="../agent/js/bootstrap.bundle.min.js"></script>
  <script src="../../agent/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="../../agent/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="../../agent/plugins/feather-icons/feather.min.js"></script>
  <script src="../agent/js/script.min.js"></script>
  <script src="../agent/js/settings.min.js"></script>

  <!-- Plugins -->
  <script src="../../agent/plugins/chart.js/Chart.min.js"></script>
  <script src="../../agent/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script>
    // Data example
    monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    data1 = [{{$salesData}}]
    data2 = [{{$AmountData}}]
    data3 = [100, 90, 60, 70, 100, 75, 90, 85, 90, 100, 95, 88]

    // Chart options
    const options = {
      maintainAspectRatio: false, // disable the maintain aspect ratio in options then it uses the available height
      tooltips: {
        mode: 'index',
        intersect: false, // Interactions configuration: https://www.chartjs.org/docs/latest/general/interactions/
      },
      elements: {
        rectangle: {
          borderWidth: 1 // bar border width
        },
        line: {
          borderWidth: 1 // label border width
        }
      },
      legend: {
        display: false // hide label
      }
    }

    /***************** Website Audience Metrics *****************/
    new Chart('websiteAudienceMetrics', {
      type: 'bar',
      data: {
        labels: monthNames,
        datasets: [
          
          {
            backgroundColor: Chart.helpers.color(blue).alpha(0.5).rgbString(),
            borderColor: blue,
            data: data2
          }
        ]
      },
      options: options
    })

    /***************** FILL AREA *****************/
    new Chart('line-chart-fill', {
      type: 'line',
      data: {
        labels: monthNames,
        datasets: [{
          label: 'My dataset',
          backgroundColor: Chart.helpers.color(yellow).alpha(0.5).rgbString(),
          borderColor: yellow,
          tension: 0,
          fill: true,
          data: data1
        }]
      },
      options: options
    })

    /***************** Sessions By Channel *****************/
    new Chart('sessionsByChannel', {
      type: 'doughnut',
      data: {
        labels: ['Organic Search', 'Email', 'Referrral', 'Social Media'],
        datasets: [{
          data: [25, 20, 30, 25],
          backgroundColor: [
            Chart.helpers.color(red).alpha(0.5).rgbString(),
            Chart.helpers.color(blue).alpha(0.5).rgbString(),
            Chart.helpers.color(cyan).alpha(0.5).rgbString(),
            Chart.helpers.color(orange).alpha(0.5).rgbString(),
          ]
        }]
      },
      options: options
    })

    /***************** Device Sessions *****************/
    new Chart('deviceSessions', {
      type: 'line',
      data: {
        labels: monthNames,
        datasets: [
          {
            label: 'Mobile',
            backgroundColor: Chart.helpers.color(blue).alpha(0.1).rgbString(),
            borderColor: blue,
            tension: 0,
            pointRadius: 0,
            data: data2
          },
          {
            label: 'Desktop',
            backgroundColor: Chart.helpers.color(yellow).alpha(0.1).rgbString(),
            borderColor: yellow,
            tension: 0,
            pointRadius: 0,
            data: data1
          },
          {
            label: 'Other',
            backgroundColor: Chart.helpers.color(pink).alpha(0.1).rgbString(),
            borderColor: pink,
            tension: 0,
            pointRadius: 0,
            data: data3
          }
        ]
      },
      options: options
    })

    $(() => {
      /***************** Connections *****************/
      $('#connections').sparkline('html', {
        type: 'bar',
        barWidth: 8,
        height: 20,
        barColor: blue
      })

      /***************** Your Articles *****************/
      $('#yourArticles').sparkline('html', {
        type: 'bar',
        barWidth: 8,
        height: 20,
        barColor: red
      })

      /***************** Your Photos *****************/
      $('#yourPhotos').sparkline('html', {
        type: 'bar',
        barWidth: 8,
        height: 20,
        barColor: green
      })

      /***************** Your Photos *****************/
      $('#pageLikes').sparkline('html', {
        type: 'bar',
        barWidth: 8,
        height: 20,
        barColor: cyan
      })
    })
  </script>
@endsection
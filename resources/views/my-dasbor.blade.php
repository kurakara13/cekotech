<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/4.5.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/ionicons/2.0.1/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> --}}
  {{-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> --}}
  {{-- <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> --}}
  @include('custom_css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('header')
    @include('leftbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>Dashboard <small>Control Panel System</small></h1>
        <ol class="breadcrumb">
          <li>Dashboard</li>
        </ol>
      </section>
      <section class="content">
        @include('dasbor.index')
      </section>
    </div>
    @include('footer')
    @include('sidebar')
    <div class="control-sidebar-bg"></div>
  </div>

  <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> --}}
  <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
  <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  {{-- <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> --}}
  <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
  <script src="{{ asset('plugins/chartjs/Chart.min.js') }}"></script>
  <script>
    $(function () {
      "use strict";
      $("#calendar").datepicker();

    });
  </script>
  <script>
    $(function () {

  'use strict';
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    datasets: [
      {
        label: "Data NPWP",
        fillColor: "rgb(210, 214, 222)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: [
        {{ implode(',', $npwp) }}
        ]
      },
      {
        label: "Belum bayar",
        fillColor: "rgba(60,110,188,0.9)",
        strokeColor: "rgba(60,110,188,0.8)",
        pointColor: "rgba(60,110,188,0.9)",
        pointStrokeColor: "rgba(60,110,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,110,188,1)",
        data: [{{ implode(',', $belumBayar) }}]
      },
      {
        label: "Bayar sebagian",
        fillColor: "rgba(20,141,20,0.9)",
        strokeColor: "rgba(20,141,20,0.8)",
        pointColor: "rgba(20,141,20,0.9)",
        pointStrokeColor: "rgba(20,141,20,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(20,141,20,1)",
        data: [{{ implode(',', $sebagian) }}]
      },
      {
        label: "Sudah bayar",
        fillColor: "rgba(10,141,188,0.9)",
        strokeColor: "rgba(10,141,188,0.8)",
        pointColor: "rgba(10,141,188,0.9)",
        pointStrokeColor: "rgba(10,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(10,141,188,1)",
        data: [{{ implode(',', $sudahBayar) }}]
      }
    ]
  };

  var salesChartOptions = {
    showScale: true,
    scaleShowGridLines: false,
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleGridLineWidth: 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    bezierCurve: true,
    bezierCurveTension: 0.3,
    pointDot: false,
    pointDotRadius: 4,
    pointDotStrokeWidth: 1,
    pointHitDetectionRadius: 20,
    datasetStroke: true,
    datasetStrokeWidth: 2,
    datasetFill: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    maintainAspectRatio: true,
    responsive: true
  };
  salesChart.Line(salesChartData, salesChartOptions);
});
  </script>
  <script src="{{ asset('dist/js/app.min.js') }}"></script>
  <script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>

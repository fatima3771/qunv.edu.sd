@extends('mco.layouts.admin')

@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{\App\User::all()->count()}}</div>
                                    <div>المتطوعين!</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/volunteers">
                            <div class="panel-footer">
                                <span class="pull-left">المزيد</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{\App\Activity::all()->count()}}</div>
                                    <div>الفعاليات!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">المزيد</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> حسب الجنس
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="gender-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> عدد المتطوعين يومياً لآخر سبعة أيام
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
@endsection

@section('scripts')
<!-- Morris Charts JavaScript -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="{{Request::root()}}/public/assets/userAccount/vendor/raphael/raphael.min.js"></script>
    <script src="{{Request::root()}}/public/assets/userAccount/vendor/morrisjs/morris.min.js"></script>
    <script>
$(function() {

  // Create a Bar Chart with Morris
  var chart = Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'morris-area-chart',
    //data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Volunteers'] // Set the label when bar is rolled over
  });

  // Fire off an AJAX request to load the data
  $.ajax({
      type: "GET",
      dataType: 'json',
      url: "admin/morrisChartData", // This is the URL to the API
      data: { days: 7 } // Passing a parameter to the API to specify number of days
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });




  var chart2 = Morris.Donut({
    // ID of the element in which to draw the chart.
    element: 'gender-chart',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
  });

  // Fire off an AJAX request to load the data
  $.ajax({
      type: "GET",
      dataType: 'json',
      url: "admin/morrisChartData/Piechart/gender" // This is the URL to the API
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart2.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });



});
</script>
@endsection
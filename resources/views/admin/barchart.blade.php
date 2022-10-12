<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- PieChart --}}
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Total', "Price" ],
            <?php echo $chartData?>
        ]);

        var options = {
          title: 'ALL SHOPPING ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    
    <script type="text/javascript">
        // hist
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Total', "Price" ],
            <?php echo $chartData?>
          ]);

        var options = {
          title: 'Lengths of Product',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('hist'));
        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
     //lineChart
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Total', "Price" ],
            <?php echo $chartData?>
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
        //barchart
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['Total', "Price" ],
            <?php echo $chartData?>
      ]);

      var options = {
        title: 'Population of Products',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Shopping in Products',
          minValue: 0
        },
        vAxis: {
          title: 'Products'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }

</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Charts</title>


</head>
<body>
    <div class="container text-center m-5">
    <h1>Show BarChart of Products</h1>
   <span class="mb-5 text-red"> Hi Admin: {{ auth()->user()->name }}</span> <br>
    <a class="btn btn-primary" href="{{url('admin/dashboard')}}">
        Back TO dashboard
    </a>
    <div class="container d-flex">
        <div id="piechart" style="width: 1000px; height: 500px"></div>
        <div id="hist" style="width: 1000px; height: 500px"></div>

    </div>
    <div class="container d-flex">
        <div id="curve_chart" style="width: 1000px; height: 500px"></div>
        <div id="chart_div" style="width: 1000px; height: 500px"></div>

        </div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></scrip>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
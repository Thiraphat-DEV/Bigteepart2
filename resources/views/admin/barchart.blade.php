<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart','bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable({{Js::from($answer)}})

                var options = {
                    charts: {
                        title: "Product from Database",
                        subtitle: "show All Products"
                    },
                };

                var charts = new google.charts.BarChart(document.getElementById(barchart));

                charts.draw(data, google.charts.Bar.convertOptions(options));
            }
    
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>BarChart</title>
</head>
<body>
    <div class="container text-center m-5">
    <h1>Show BarChart of Products</h1>
    <a class="btn btn-primary" href="{{url('admin/dashboard')}}">
        Back TO dashboard
    </a>
    <div id="barchart" style="width: 1000px; height: 500px"></div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
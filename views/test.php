<!DOCTYPE html>
<html>
<head>
    <title>Province Chart</title>

    <style>
        body{
            display:flex;
            height:100vh;
            align-items:center;
            justify-content:center;
            background-color:skyblue;
        }
        
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Province');
            data.addColumn('number', 'Count');
            <?php foreach($data as $row): ?>
                data.addRow(['<?php echo $row->province; ?>', <?php echo $row->count; ?>]);
            <?php endforeach; ?>

            var options = {
                title: 'Users According To Their Province',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart_div" style="width: 800px; height: 500px;"></div>
</body>
</html>

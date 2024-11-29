<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Distribution Pie Chart</title>

    <!-- DevExtreme CSS and JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/24.1.7/css/dx.light.css">
    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/24.1.7/js/dx.all.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #2c2c2c;
            color: white;
        }

        .chart-container {
            margin: 50px auto;
            width: 60%;
            text-align: center;
        }

        .dx-pie-chart {
            background-color: #444444;
            color: white;
        }
        
    </style>
</head>

<body>
    <div class="chart-container">
        <div id="pieChartContainer"></div>
    </div>

    <script>
        $(function() {

            $.ajax({
                url: "../classes/getSports.php",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    
                    $("#pieChartContainer").dxPieChart({
                        dataSource: data,
                        series: {
                            argumentField: "sport",
                            valueField: "count",
                            label: {
                                visible: true,
                                connector: {
                                    visible: true
                                },
                                customizeText: function(pointInfo) {
                                    return `${pointInfo.argument}: ${pointInfo.value}`;
                                }
                            }
                        },
                        hoverStyle: {
                            color: '#ffd700',
                        },
                        onPointClick(arg) {
                            arg.target.select();
                        },
                        type: "doughnut",
                        legend: {
                            visible: true,
                            verticalAlignment: "bottom",
                            horizontalAlignment: "center",
                            font: {
                                color: "white"
                            }
                        },
                        title: {
                            text: "Sport Distribution",
                            font: {
                                color: "white"
                            }
                        },
                        palette: ["#ff6384", "#36a2eb", "#ffce56"],
                        tooltip: {
                            enabled: true,
                            customizeTooltip: function(pointInfo) {
                                return {
                                    text: `${pointInfo.argument}: ${pointInfo.value} users`
                                };
                            }
                        },
                        export: {
                            enabled: true,
                            printingEnabled: false,
                            fileName: "Exported_chart",
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching pie chart data:", error);
                }
            });
        });
    </script>
</body>

</html>
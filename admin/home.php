<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3><sup style="font-size: 20px">Total Staff</sup></h3>
              <?php
            $mydb = new Database();

// Set the SQL query to retrieve the total employee number
$mydb->setQuery("SELECT COUNT(*) AS totalCompany FROM tblCompany");

// Execute the query and fetch the result
$result = $mydb->loadSingleResult();

// Access the total employee number
$totalCompany = $result->totalCompany;

// Output the result
// echo " " . $totalApplicants;
echo "<strong style='font-size: 24px;'>" . $totalCompany . "</strong>";
?>


            
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href=serviceman/index.php class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3><sup style="font-size: 20px">Total Service</sup></h3>
            <?php
            $mydb = new Database();

// Set the SQL query to retrieve the total vacancy number
$mydb->setQuery("SELECT COUNT(*) AS totaljob FROM tbljob");

// Execute the query and fetch the result
$result = $mydb->loadSingleResult();

// Access the total employee number
$totaljob = $result->totaljob;

// Output the result
// echo " " . $totalVacancy;
echo "<strong style='font-size: 24px;'>" . $totaljob . "</strong>";
?>    
       </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href=services/index.php class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>




        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><sup style="font-size: 20px">Total Category</sup></h3>
              <?php
            $mydb = new Database();

// Set the SQL query to retrieve the total employee number
$mydb->setQuery("SELECT COUNT(*) AS totalcategory FROM tblcategory");

// Execute the query and fetch the result
$result = $mydb->loadSingleResult();

// Access the total employee number
$totalcategory = $result->totalcategory;

// Output the result
// echo " " . $totalApplicants;
echo "<strong style='font-size: 24px;'>" . $totalcategory . "</strong>";
?>


            
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href=category/index.php class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>




        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3><sup style="font-size: 20px">Total Booking</sup></h3>
              <?php
            $mydb = new Database();

// Set the SQL query to retrieve the total employee number
$mydb->setQuery("SELECT COUNT(*) AS totalApplicants FROM tblApplicants");

// Execute the query and fetch the result
$result = $mydb->loadSingleResult();

// Access the total employee number
$totalApplicants = $result->totalApplicants;

// Output the result
// echo " " . $totalApplicants;
echo "<strong style='font-size: 24px;'>" . $totalApplicants . "</strong>";
?>


            
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href=applicants/index.php class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>      
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->








    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics Dashboard</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: black;
        }
        .filters {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }
        .filters label {
            font-weight: bold;
        }
        .filters select,
        .filters input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .filters select {
            flex-grow: 1;
            max-width: 200px;
        }
        .chart-container {
            position: relative;
            height: 300px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Statistics Dashboard</h1>
        <!-- Sorting and Filtering Options -->
        <div class="filters">
            <label for="sortBy">Sort by:</label>
            <select id="sortBy">
                <option value="greaterToLesser">Greater to Lesser</option>
                <option value="lesserToGreater">Lesser to Greater</option>
            </select>
            <label for="filter">Filter by:</label>
            <input type="text" id="filter" placeholder="Enter filter keyword">
        </div>

        <!-- Chart Canvas -->
        <div class="chart-container">
            <canvas id="statisticsChart"></canvas>
        </div>
    </div>

    <script>
        // Sample data (replace with actual data)
        var statisticsData = {
            totalserviceman: <?php echo $totalCompany; ?>,
            totalservices: <?php echo $totaljob; ?>,
            totalcategory: <?php echo $totalcategory; ?>,
            totalbooking: <?php echo $totalApplicants; ?>
        };

        var ctx = document.getElementById("statisticsChart").getContext("2d");
        var chart;
        var lineChartEnabled = false; // To track whether line chart is enabled

        var sortByOption = "greaterToLesser";

        // Function to create and update the chart
        function createChart(data) {
            if (chart) {
                chart.destroy();
            }

            // Convert data into an array of objects for sorting
            var dataArray = Object.entries(data).map(([key, value]) => ({ key, value }));

            // Perform sorting based on the selected option
            if (sortByOption === "greaterToLesser") {
                dataArray.sort((a, b) => b.value - a.value); // Sort greater to lesser
            } else {
                dataArray.sort((a, b) => a.value - b.value); // Sort lesser to greater
            }

            // Create a new object with sorted data
            var sortedData = {};
            dataArray.forEach(item => {
                sortedData[item.key] = item.value;
            });

            var chartType = lineChartEnabled ? "lineGraph" : "barGraph";

            if (chartType === "lineGraph") {
                chart = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: Object.keys(sortedData),
                        datasets: [{
                            label: "Statistics",
                            borderColor: "#007bff",
                            fill: false,
                            data: Object.values(sortedData)
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            } else {
                chart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: Object.keys(sortedData),
                        datasets: [{
                            label: "Statistics",
                            backgroundColor: ["#007bff", "#28a745", "#ffc107", "#dc3545"],
                            data: Object.values(sortedData)
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        }

        // Initial chart creation with bar chart
        createChart(statisticsData);

        // Event listeners for sorting and filtering
        document.getElementById("sortBy").addEventListener("change", function () {
            sortByOption = this.value;
            createChart(statisticsData);
        });

        document.getElementById("filter").addEventListener("input", function () {
            var filterKeyword = this.value.toLowerCase();
            // Filter the statisticsData by the keyword
            var filteredData = {};
            for (var key in statisticsData) {
                if (key.toLowerCase().includes(filterKeyword)) {
                    filteredData[key] = statisticsData[key];
                }
            }
            createChart(filteredData);
        });

        // Event listener to toggle chart type
        document.getElementById("statisticsChart").addEventListener("click", function () {
            lineChartEnabled = !lineChartEnabled;
            createChart(statisticsData);
        });
    </script>
</body>
</html>
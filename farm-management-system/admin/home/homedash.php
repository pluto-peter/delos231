<?php include 'inc/header.php'; ?>
<?php include 'inc/side-bar.php'; ?>


<section class="graphs">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <div class="cards1">
    <div class="data1">
      <img src="images/flag.svg" alt="">
      <h2>total acreage</h2>
      <p>1,630,089 acres</p>
      <div class="border"></div>
    </div>

    <div class="data1">
      <img src="images/horse.svg" alt="">
      <h2>total livestock</h2>
      <p>67,554 animals</p>
      <div class="border"></div>
    </div>

    <div class="data1">
      <img src="images/sun-plant-wilt.svg" alt="">
      <h2>total crops</h2>
      <p>134 sections</p>
      <div class="border"></div>
    </div>

    <div class="data1">
      <img src="images/truck.svg" alt="">
      <h2>total vehicles</h2>
      <p>78 cars</p>
      <div class="border"></div>
    </div>

    <div class="data1">
      <img src="images/users.svg" alt="">
      <h2>total staff</h2>
      <p>257 staff</p>
      <div class="border"></div>
    </div>
  </div>




  <div class="graph2">

    <div class="graphcontent">

      <h2>Total Acreage</h2>
      <canvas id="taskCompletion"></canvas>

      <script>
        // JavaScript code to create a donut graph using Chart.js
        var ctx = document.getElementById('taskCompletion').getContext('2d');
        var taskCompletionChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Livestock', 'Crops', 'Forest'],
            datasets: [{
              label: 'Acres (ha)',
              data: [34, 24, 42], // Example data representing task completion percentages
              backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
              ],
              borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Total Livestock'
              }
            }
          }
        });
      </script>

    </div>






    <div class="graphcontent">

      <h2>Total Livestock</h2>
      <canvas id="livestockChart"></canvas>

      <script>
        // JavaScript code to create a donut graph using Chart.js
        var ctx = document.getElementById('livestockChart').getContext('2d');
        var livestockChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Cattle', 'Sheep', 'Horses'],
            datasets: [{
              label: 'Total Livestock (animals)',
              data: [20, 30, 50], // Example data
              backgroundColor: [
                'rgba(192, 116, 156, 0.8)',
                'rgba(114, 30, 188, 0.8)',
                'rgba(30, 224, 185, 0.8)',
              ],
              borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Total Livestock'
              }
            }
          }
        });
      </script>


    </div>






    <div class="graphcontent">




      <h2>Total Crops</h2>
      <canvas id="cropChart"></canvas>

      <script>
        // JavaScript code to create a donut graph using Chart.js
        var ctx = document.getElementById('cropChart').getContext('2d');
        var cropChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Fruits', 'Vegetables', 'Cereals'],
            datasets: [{
              label: 'Crops (ha)',
              data: [44, 20, 36], // Example data
              backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
              ],
              borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Total Crops'
              }
            }
          }
        });
      </script>

    </div>


    <div class="graphcontent">


      <h2>Total Vehicles</h2>
      <canvas id="carChart"></canvas>

      <script>
        // JavaScript code to create a donut graph using Chart.js
        var ctx = document.getElementById('carChart').getContext('2d');
        var carChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Saloon', 'Pickups', 'Trucks', 'Tractors', 'Buses', 'Electric'],
            datasets: [{
              label: 'Total Vehicles (number)',
              data: [5, 20, 36, 7, 3, 31], // Example data
              backgroundColor: [
                'rgba(128, 179, 169, 0.8)',
                'rgba(128, 179, 70, 0.8)',
                'rgba(61, 179, 221, 0.8)',
                'rgba(61, 179, 221, 0.22)',
                'rgba(61, 32, 221, 0.22)',
                'rgba(13, 10, 28, 0.22)',
              ],
              borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(201, 116, 26, 0.22)',
                'rgba(26, 196, 201, 0.46)',
                'rgba(182, 218, 220, 0.46)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Total Cars'
              }
            }
          }
        });
      </script>
    </div>


  </div>

  <div class="graph2">


    <div class="graphcontent">

      <h2>Rainfall Distribution</h2>
      <canvas id="rainfall"></canvas>

      <script>
        // JavaScript code to create a line chart using Chart.js
        var ctx = document.getElementById('rainfall').getContext('2d');
        var rainChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
              label: 'Rainfall (mm)',
              data: [40, 55, 35, 30, 38, 44], // Example data
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1,
              fill: false
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Rainfall Distribution'
              }
            }
          }
        });
      </script>

    </div>


    <div class="graphcontent">

      <h2>Temperature Trends</h2>
      <canvas id="temperature"></canvas>

      <script>
        // JavaScript code to create a line chart using Chart.js
        var ctx = document.getElementById('temperature').getContext('2d');
        var temperatureChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
              label: 'Temperature (°C)',
              data: [10, 12, 15, 11, 9, 12], // Example temperature data
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1,
              fill: false
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Temperature Trend'
              }
            }
          }
        });
      </script>

    </div>





    <div class="graphcontent">

      <h2>Soil Moisture Levels</h2>
      <canvas id="soilMoisture"></canvas>

      <script>
        // JavaScript code to create a bar chart using Chart.js
        var ctx = document.getElementById('soilMoisture').getContext('2d');
        var soilChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['MORNING', 'MID DAY', 'AFTER NOON', 'EVENING'],
            datasets: [{
              label: 'Moisture Level (mm)',
              data: [2000, 1200, 800, 1700], // Example sales data
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Soil Moisture Level'
              }
            }
          }
        });
      </script>

    </div>
  </div>


  <div class="graph2">

    <div class="graphcontent">



      <h2>Crop Yield Trends</h2>
      <canvas id="yieldChart"></canvas>

      <script>
        // JavaScript code to create a line chart using Chart.js
        var ctx = document.getElementById('yieldChart').getContext('2d');
        var yieldChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
              label: 'Yields (tonnes)',
              data: [10, 12, 14, 9, 16, 20], // Example data
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1,
              fill: false
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Crop Yield Trends'
              }
            }
          }
        });
      </script>
    </div>


    <div class="graphcontent">



      <h2>Last Months Yields</h2>
      <canvas id="yields1Chart"></canvas>

      <script>
        // JavaScript code to create a bar chart using Chart.js
        var ctx = document.getElementById('yields1Chart').getContext('2d');
        var yields1Chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Fruits', 'Vegetables', 'Cereals'],
            datasets: [{
              label: 'Produce (tonnes)',
              data: [1000, 1200, 800], // Example sales data
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',

                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
              ],
              borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Last Months Yields'
              }
            }
          }
        });
      </script>


    </div>


    <div class="graphcontent">




      <h2>Beef Production Trends</h2>
      <canvas id="beefChart"></canvas>

      <script>
        // JavaScript code to create a line chart using Chart.js
        var ctx = document.getElementById('beefChart').getContext('2d');
        var beefChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
              label: 'Beef (tonnes)',
              data: [54, 42, 51, 39, 35, 45], // Example data
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1,
              fill: false
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Beef Production Trends'
              }
            }
          }
        });
      </script>


    </div>
  </div>

  <div class="graph2" style="height:30%; display: grid; grid-template-columns: 1fr 1fr; gap:50px">

    <div class="graphcontent">


      <h2>Task Completion Status</h2>
      <canvas id="taskCompletionChart" style="height:30%;"></canvas>

      <script>
        // JavaScript code to create a donut graph using Chart.js
        var ctx = document.getElementById('taskCompletionChart').getContext('2d');
        var taskCompletionChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Completed', 'In Progress', 'Pending'],
            datasets: [{
              label: 'Completion Status (%)',
              data: [22, 37, 41], // Example data representing task completion percentages
              backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
              ],
              borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Task Completion Status'
              }
            }
          }
        });
      </script>
    </div>



    <div class="graphcontent">


      <h2>Task Completion by Department</h2>
      <canvas id="taskCompletion1Chart"></canvas>

      <script>
        // JavaScript code to create a donut graph using Chart.js
        var ctx = document.getElementById('taskCompletion1Chart').getContext('2d');
        var taskCompletion1Chart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['Livestock', 'Farm Produce', 'General'],
            datasets: [{
              label: 'Completion Status (%)',
              data: [33, 42, 25], // Example data
              backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
              ],
              borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Task Completion Status'
              }
            }
          }
        });
      </script>
    </div>


  </div>


</section>

<?php include 'inc/footer.php'; ?>
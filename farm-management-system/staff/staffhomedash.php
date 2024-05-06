<?php
include 'inc/header.php';
//include 'inc/side-bar.php';
?>



<section class="graphs">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="cards1">
        <div class="data1">
            <img src="images/people-carry-box.svg" alt="">
            <h2>pending tasks</h2>
            <p>3 tasks</p>
            <div class="border"></div>
        </div>

        <div class="data1">
            <img src="images/check-to-slot.svg" alt="">
            <h2>completed tasks</h2>
            <p>67 tasks</p>
            <div class="border"></div>
        </div>

        <div class="data1">
            <img src="images/calendar-xmark.svg" alt="">
            <h2>deadlines</h2>
            <p>0 deadlines</p>
            <div class="border"></div>
        </div>

    </div>

    <div class="graph2">

        <div class="graphcontent">

            <h2>Task Completion Data</h2>
            <canvas id="taskCompletionChart"></canvas>

            <script>
                // JavaScript code to create a donut graph using Chart.js
                var ctx = document.getElementById('taskCompletionChart').getContext('2d');
                var taskCompletionChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Completed', 'In Progress', 'Pending'],
                        datasets: [{
                            label: 'Task Completion Status',
                            data: [20, 30, 50], // Example data representing task completion percentages
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

            <h2>Goal Attainment</h2>
            <canvas id="goalCompletionChart"></canvas>

            <script>
                // JavaScript code to create a donut graph using Chart.js
                var ctx = document.getElementById('goalCompletionChart').getContext('2d');
                var goalCompletionChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Livestock', 'Farm Produce', 'Miscallaneous'],
                        datasets: [{
                            label: 'Goal Attainment Status',
                            data: [20, 30, 50], // Example data
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
                                text: 'Goal Attainment Status'
                            }
                        }
                    }
                });
            </script>

        </div>

        <div class="graphcontent">

            <h2>Staff Satisfaction Data</h2>
            <canvas id="staffChart"></canvas>

            <script>
                // JavaScript code to create a bar chart using Chart.js
                var ctx = document.getElementById('staffChart').getContext('2d');
                var staffChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Livestock', 'Fresh Produce', 'General'],
                        datasets: [{
                            label: 'Satisfaction Rates(%)',
                            data: [98, 96, 90], // Example data
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
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
                                text: 'Staff Satisfaction Data'
                            }
                        }
                    }
                });
            </script>

        </div>

    </div>

    <div class="graph2">





        <div class="graphcontent">

            <h2>Temperature Trends</h2>
            <canvas id="temperatureChart"></canvas>

            <script>
                // JavaScript code to create a line chart using Chart.js
                var ctx = document.getElementById('temperatureChart').getContext('2d');
                var temperatureChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                        datasets: [{
                            label: 'Temperature (°C)',
                            data: [10, 12, 15, 18, 20, 22], // Example temperature data
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

            <h2>Rainfall Trends</h2>
            <canvas id="rainChart"></canvas>

            <script>
                // JavaScript code to create a line chart using Chart.js
                var ctx = document.getElementById('rainChart').getContext('2d');
                var rainChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                        datasets: [{
                            label: 'Rainfall (mm)',
                            data: [56, 42, 45, 38, 50, 67], // Example temperature data
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

            <h2>Last Months Yields</h2>
            <canvas id="yieldsChart" width="400" height="200"></canvas>

            <script>
                // JavaScript code to create a bar chart using Chart.js
                var ctx = document.getElementById('yieldsChart').getContext('2d');
                var yieldsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['beef', 'bananas', 'apples', 'grapes', 'avocadoes', 'cabbages', 'lettuce', 'wheat', 'maize'],
                        datasets: [{
                            label: 'produce (tonnes)',
                            data: [1000, 1200, 800, 1500, 3000, 2388, 1499, 2600, 200], // Example sales data
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
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
                                text: 'Yields'
                            }
                        }
                    }
                });
            </script>

        </div>

    </div>
</section>


<?php include 'inc/footer.php'; ?>
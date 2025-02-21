<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #4CAF50;
            color: white;
            padding: 20px;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link.active {
            background-color: #388E3C;
            border-radius: 5px;
        }
        .logout-btn {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #c9302c;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card-header {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar position-fixed">
                <h3 class="text-center">EDEXCEL</h3>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Teacher</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Students</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Direct Inquiry</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog List</a></li>
                </ul>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 offset-md-2">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    @if(!empty($tutor) && isset($tutor->id))
                    <form method="POST" action="{{ route('logout.teacher', $tutor->id) }}">
                        @csrf
                        <button type="submit" class="btn" style="color: white; background-color:#4CAF50;">Logout</button>
                    </form>
                @endif
                
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-center p-3">
                            <h3 class="text-success">500+</h3>
                            <p>Teachers</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center p-3">
                            <h3 class="text-success">1000+</h3>
                            <p>Students</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center p-3">
                            <h3 class="text-success">1500+</h3>
                            <p>Subjects</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center p-3">
                            <h3 class="text-success">500+</h3>
                            <p>Languages</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Edexcel Overview</div>
                            <div class="card-body">
                                <canvas id="overviewChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Revenue Sources</div>
                            <div class="card-body">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx1 = document.getElementById('overviewChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Overview',
                    data: [10, 20, 30, 40, 50, 60],
                    borderColor: '#4CAF50',
                    fill: false
                }]
            }
        });
        const ctx2 = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Product A', 'Product B', 'Product C'],
                datasets: [{
                    data: [50, 30, 20],
                    backgroundColor: ['#4CAF50', '#66BB6A', '#81C784']
                }]
            }
        });
    </script>
</body>
</html>

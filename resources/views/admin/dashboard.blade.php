<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }
        .navbar {
            background-color: #004b8d;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .btn-orange {
            background-color: #ff8c00;
            color: white;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
</nav>
<div class="container mt-4">
    <h1 class="mb-4">Welcome, Admin</h1>
    <div class="row">
        <div class="col-md-6">
            <h3>Job Seekers</h3>
            <ul class="list-group">
                @foreach($jobSeekers as $seeker)
                    <li class="list-group-item">{{ $seeker->name }} - {{ $seeker->email }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h3>Employers</h3>
            <ul class="list-group">
                @foreach($employers as $employer)
                    <li class="list-group-item">{{ $employer->company_name }} - {{ $employer->email }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</body>
</html>

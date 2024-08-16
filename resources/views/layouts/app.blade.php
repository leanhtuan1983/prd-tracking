<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/depMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    <script src="{{ asset('assets/js/status.js')}}"></script>
    <script src="{{ asset('assets/js/chart.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">DASHBOARD</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('lots.index') }}">Lots</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('procedures.index') }}">Procedures</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Departments</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('processes.index') }}">Processes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tracking.index') }}">Input</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('fe.index') }}">Tracking</a></li>
                    
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Gọi hàm JavaScript để cập nhật màu nền cho tất cả các element có class 'status-element' -->
    <script>   
        updateBackgroundColors('status-element');
    </script>
</body>
</html>

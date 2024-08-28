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
    <link rel="stylesheet" href="{{ asset('assets/css/deptMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fe.css') }}">
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
    <div class="container-fluid">
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> 
            <nav class="navbar">
                <ul class="navbar-nav" style = "width:100%;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Database</a>
                            <div class="dropdown-menu -ml-1">
                                <a class="dropdown-item" href="{{ route('categories.index') }}">Category</a>
                                <a class="dropdown-item" href="{{ route('products.index') }}">Product</a>
                                <a class="dropdown-item" href="{{ route('lots.index') }}">Lot</a>
                                <a class="dropdown-item" href="{{ route('procedures.index') }}">Procedure</a>
                                <a class="dropdown-item" href="{{ route('departments.index') }}">Department</a>
                                <a class="dropdown-item" href="{{ route('processes.index') }}">Process</a>
                            </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('working_time.index') }}">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tracking.index') }}">Input</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fe.index') }}">Tracking</a>
                    </li>       
                </ul>
            </nav>
        </div>

        <div id="main">
            <div class="menu-btn">
                <div class="sidebar-menu">
                <button class="openbtn" id="openbtn" onclick="openNav()">☰ Open Sidebar</button> 
                </div>       
            </div>
           @yield('content')     
        </div>
    </div>
    <!-- Hàm đóng/mở sidebar -->
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("openbtn").classList.add('hidden');
            }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.getElementById("openbtn").classList.remove('hidden');
            }
    </script>
   
  
    <!-- Gọi hàm JavaScript để cập nhật màu nền cho tất cả các element có class 'status-element' -->
    <script>   
        updateBackgroundColors('status-element');
    </script>

</body>
</html>

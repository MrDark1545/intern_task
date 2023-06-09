<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Intern Task</title>

    <!-- Font Awesome UI KIT-->
    <script src="https://kit.fontawesome.com/f75ab26951.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
   

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Excel files
    </div>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('stock.create') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Add users</span></a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('stock.index') }}">
            <i class="fas fa-fw fa-eye"></i>
            <span>Data Table</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('stock.import') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Import Data</span></a>
    </li>

</ul>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content" class="py-5">

                @yield('content')

            </div>
          
        </div>
   
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<!-- Log on to codeastro.com for more projects -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="{{asset('images/lugu.png')}}">


    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('css')
    <script>
        window.APP = <?php echo json_encode([
                            'currency_symbol' => config('settings.currency_symbol'),
                            'warning_quantity' => config('settings.warning_quantity')
                        ]) ?>
    </script>

    <style>
        /* .dashboard-box {
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
}
.bg-light-green {
    background-color: #d4edda;
}
.bg-light-yellow {
    background-color: #fff3cd;
}
.bg-light-gray {
    background-color: #f8f9fa;
} */

/* Add custom styles for the dashboard */
.header-banner {
    background-image: url('/path/to/your/header-image.jpg');
    height: 200px;
    background-size: cover;
    background-position: center;
}

/* Main container adjustments */
.small-box {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
    padding: 20px;
}

.small-box .sheesh {
    position: absolute;
    bottom: 1px;
    left: 10px;
    font-size: 10rem; /* Adjust the size as needed */
}

.sheesh-letter {
    color:black;
    text-decoration: none;
    font-size:3.3rem;
    margin-left: auto;


}

/* Icon positioning */
.small-box .haha {
    position: absolute;
    bottom: 10px;
    left: 10px;
    font-size: 3rem; /* Adjust the size as needed */
}



/* Title and content */
.small-box .inner {
    margin-bottom: 40px; /* To ensure there's space for the icon */
}

.small-box h3 {
    font-size: 2rem; /* Adjust based on your design */
}

.small-box .ha {
    font-size: 1.2rem;
    color:black
}

.small-box p {
    font-size: 1.2rem;
    color:red
}


.hehe {

    text-decoration: none;
    font-size:1.2rem;
    margin-left:60px;
    font-weight:500;
    margin-bottom:10px

}





/* Ensure all small boxes have a consistent size and space between them */
.col-lg-6, .col {
    margin-bottom: 20px;
}

.small-box-footer i {
    margin-left: 5px;
}

/* Adjust flexbox layout for smaller grids */
.row-cols-2 .col {
    margin-bottom: 10px;
}






    </style>





</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('content-header')</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            @yield('content-actions')
                        </div><!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->
            </section><!-- Log on to codeastro.com for more projects -->

            <!-- Main content -->
            <section class="content">
                @include('layouts.partials.alert.success')
                @include('layouts.partials.alert.error')
                @yield('content')
            </section>

        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div><!-- Log on to codeastro.com for more projects -->
    <!-- ./wrapper -->

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>

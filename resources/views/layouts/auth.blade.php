<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="{{asset('images/lugu.png')}}">

    <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}


   /* Global styles */
   * {
        box-sizing: border-box;
    }

    body {
        font-size: 14px;
        margin: 0;
        padding: 0;
    }


    .v85_3 {
    background: rgba(12, 26, 25, 0.7);
    position: relative;
    overflow: hidden;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    /* z-index: -2; */
}



    .v85_4 {
        background: url("../images/bg.png");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        filter: blur(5px);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    /* Form container styles */
    .form-container {
        background: transparent;
        border-radius: 15px;
        padding: 50px;
        max-width: 500px;
        width: 100%;
        margin: auto;
        /* box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5); */
        color: white;
    }

    .form-container .logo-container img {
        max-width: 300px;
        display: block;
        margin: 0 auto 20px auto;
        border-radius: 10px;
    }

    .form-container input[type="email"],
    .form-container input[type="password"] {
        background: rgba(0, 0, 0, 0.2);
        font-weight: lighter;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 12px;
        width: 100%;
        margin-bottom: 10px;
    }

    /* .form-container .form-check-input {
        background-color: transparent;
        border-color: white;
        color:white;
    } */

    /* .form-container .form-check-label,
    .form-container label {

        color: white;
    } */


    .form-container .btn-primary {
        background: rgba(0, 128, 128, 0.7);
        border: none;
        border-radius: 10px;
        padding: 10px;
        width: 100%;
    }

    .form-container a {
        color: #00e0ff;
        text-decoration: none;
    }

    .form-container a:hover {
        text-decoration: underline;
    }

    .form-container .text-center p {
        margin-top: 20px;
    }



  input::placeholder {
  color: white; /* Makes placeholder text white */
  opacity: 1;   /* Ensures the color appears fully */

}

    </style>
    @yield('css')
</head>


<body >

                @yield('content')


            <!-- /.login-card-body -->


    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')

</body>

</html>

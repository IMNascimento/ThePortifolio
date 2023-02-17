<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{asset('assets/fonts-icons/themify-icons/css/themify-icons.css')}}">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{asset('assets/css/meyawo.css')}}">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @yield('content')

    <!-- core  -->
    <script src="{{asset('assets/js/jquery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap/bootstrap.bundle.js')}}"></script>
    <!-- bootstrap 3 affix -->
    <script src="{{asset('assets/js/bootstrap/bootstrap.affix.js')}}"></script>
    <!-- Meyawo js -->
    <script src="{{asset('assets/js/meyawo.js')}}"></script>
</body>
</html>
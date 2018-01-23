<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico">
    <!-- css -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/shingnan.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
    <!-- main-content -->
    <div class="container-fluid content p-0">
            @include('partials.navigationbar')
            @yield('content')
    </div>
    @include('partials.footer')
</body>
</html>
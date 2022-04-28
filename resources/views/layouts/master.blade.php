<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Ecommerce</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    @yield('style')
</head>
<body>
    @include('layouts.header')
    @yield('content')
    
    <script src="/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>
</html>
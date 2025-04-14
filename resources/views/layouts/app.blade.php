<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/layouts/layout.css')}}">
</head>
<body>

    <!-- Navbar -->
    @include('layouts.header')

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('layout.sidebar')
    @include('layout.header')
    <main>
   @yield('content')
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}" crossorigin="anonymous"> 
    <title>Módulo admin</title>
</head>
<body class="bg-info">  
    @include('dashboard.partials.nav-header-main')
    <div class="container mt-3">
        @include('dashboard.partials.session-flash-status')
        @yield('content') 
    </div>    
</body>
<script src="{{ asset("js/app.js") }}"></script>
</html>
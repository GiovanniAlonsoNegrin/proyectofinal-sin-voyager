<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/main.css") }}" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Módulo admin</title>
</head>
<body>  
    @include('dashboard.partials.nav-header-main')
    <div class="container mt-3">
        @include('dashboard.partials.session-flash-status')
        @yield('content') 
    </div>    
</body>
<script src="{{ asset("js/app.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</html>
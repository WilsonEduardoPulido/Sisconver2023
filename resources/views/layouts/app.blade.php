<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="Sistema de inventario Colegio la independencia SISCONVER">
    <meta name="author" content="Grupo_2 SISCONVER">
    <meta name="copyright" content="Copyright SISCONVER 2022 ©">
    <meta name="keywords" content="HTML, Sistema de inventario">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') |
        @endif {{ config('app.name', 'Sisconver') }}
    </title>
   
    




    <!-- Styles -->
    @vite(['resources/css/style.css', 'resources/css/newStyle.css','resources/css/darkmode.css'])
    <!-- Scripts -->

    @livewireStyles
    
    <link rel="icon" href=" {{ asset('img/logoproyecto.png') }} " type="image/x-icon">


</head>

<body class="contendor">
    <div id="app" class="">


        <main class="">
            @yield('content')
        </main>
    </div>
    @livewireScripts


@vite(['resources/js/app.js','resources/js/darkmode.js','resources/js/fontsize.js'])




</body>

<script>


    let c = document.getElementById('c');

    c.addEventListerner('change',(event)=>{
        let checkend=event.target.checked;
        if(checkend
        )
    });
</script>




</html>

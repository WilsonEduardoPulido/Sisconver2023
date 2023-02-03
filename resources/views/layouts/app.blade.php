<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') |
        @endif {{ config('app.name', 'Sisconver') }}
    </title>
   <style>
        
   </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   


    <!-- Styles -->
    @vite(['resources/css/style.css', 'resources/css/newStyle.css'])
    <!-- Scripts -->
   
    @livewireStyles
    <link rel="icon" href=" {{ asset('img/lulogo_PLumita.svg') }} " type="image/x-icon">

    
</head>

<body class="contendor">
    <div id="app" class="">


        <main class="">
            @yield('content')
        </main>
    </div>
    @livewireScripts
   
<script src="{{ asset('jquery3.6.3.js') }}"></script>
@vite(['resources/js/app.js'])


</body>

<script>


    let c = document.getElementById('c');

    c.addEventListerner('change',(event)=>{
        let checkend=event.target.checked;
        if(checkend
        )
    })
</script>




</html>

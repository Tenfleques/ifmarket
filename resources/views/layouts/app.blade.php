<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Tendai Chikake" />
        <title>Market</title>

        <!--libs-->
        <script src="js/app.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!--[if lt IE 9]>
            <script src="/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet" type="text/css">
        <link href="css/index.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/jquery-ui.min.css">
    </head>
    <body>
        @yield('navigation')
        <div class="content container-fluid p-5">
            @show
            <div class="content">
                @yield('content')                
            </div>
        </div>
        @yield('footer')
       
        <script src="/js/prototypes.js"></script>
        <script src="/js/storage.js"></script>
        <script src="/js/jquery.flot.js"></script>
            
        <script src="/js/index.js"></script>
        <script src="/js/form.js"></script>
    </body>
</html>

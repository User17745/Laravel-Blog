<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'LSAPP')}}</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="container" style="
            border-width: 2px;
            border-color: #eee;
            border-style: solid;
            border-radius: 25px;
            margin-top: 2em;
            ">
            <div class="flex-center position-ref custom-height">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        
        @include('inc.navbar')    
    </body>
</html>

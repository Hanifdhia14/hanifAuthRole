<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel=”icon” href=”logobaru.jpg”>
        <title>E-AKIO</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            .border-t{border-top-width:1px}
            .flex{display:flex}
            .grid{display:grid}
            .items-center{align-items:center}
            .justify-center{justify-content:center}
            .min-h-screen{min-height:100vh}
            .overflow-hidden{overflow:hidden}
            .p-6{padding:5.5rem}
            .py-4{padding-top:20rem;
                padding-bottom:10rem}
            .px-6{padding-left:45rem;
                padding-right:45rem}
            .pt-8{padding-top:2rem}
            .fixed{position:fixed}



        </style>

        <style>
            body {

                background-image: url('pelabuhan.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            a{
                font-size: 30pt;
                font-family: fantasy;
                color: white;
            }

            #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            }

        </style>
    </head>
    <body class="antialiased">
        <video autoplay muted loop id="myVideo">
            <source src="video.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline"></a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"></a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </body>
    <script>
        var video = document.getElementById("myVideo");
    </script>
</html>

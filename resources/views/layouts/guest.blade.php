<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Infotech EUC</title>
        <link rel="icon" href="{!! asset('pictures/dxclogoPurpleBlackRGB.png') !!}"/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            body{
                /* background-image: url('{{ asset('pictures/try2.jpg') }}') !important;
                background-size: 1270px 665px; */
                /* background-image: url('{{ asset('pictures/try1.jpg') }}') !important;
                background-size: 1250px 665px; */
                background-image: url('{{ asset('pictures/test3.png') }}') !important;
                background-size: 1300px 665px;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                
            }
            .logo {
                margin-bottom: 20px;
                display: flex;
                justify-content:center;
            }

            .auth-card {
                background: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <div class="auth-card w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="logo">
                    <img src="{{ asset('pictures/dxclogoPurpleBlackRGB.png') }}" alt="DXC logo" class="h-20">
                </div>
                {{ $slot }}
            </div>
        </div>
        </div>
    </body>
    
</html>

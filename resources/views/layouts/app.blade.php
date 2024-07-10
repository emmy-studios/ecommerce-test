<!DOCTYPE html>
<html lang="en">

    <head>

        {{-- Meta Information --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        {{-- Page Information --}}
        <title>@yield('title', 'Welcome | Ecommerce Website')</title>
        
        {{-- Author: Fernando Arroliga --}}
        {{-- Day of Creation: March 20, 2024 --}}

        {{-- AlpineJS Data Setup --}} 
        <style>
            [x-cloak] {
                display: none;
            }
        </style>

        {{-- Font Awesome Icons --}}
        <script src="https://kit.fontawesome.com/9a6f0fd7f8.js" crossorigin="anonymous"></script>

        {{-- Google Fonts: Poppins --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        {{-- CSS Styles --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Livewire Styles --}}
        @livewireStyles
        
    </head>

    <body>
        
        @yield('content')

        {{-- Livewire Scripts --}}
        @livewireScripts

    </body>

</html>
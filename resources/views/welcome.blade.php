<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
  
        <!-- Styles -->

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
   
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100  sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700  underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700  underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700  underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:pt-0 animate-bounce  ">
               <x-svg.smile></x-svg.smile>
             
                </div>

                <div class="mt-8 bg-white 0 overflow-hidden shadow sm:rounded-lg">
                    <div class="">
                        <div class="p-6">
                            <div class="flex justify-center">
                                <div class=" text-lg text-bold block ">
                                    <a href="/" class="  text-gray-500 "><p class="text-[43px] p-4">Appointy</p></a>
                                </div>
                                
                            </div>

                            <div class='flex justify-center text-gray-900 p-10'><p>Welcome , please <a class ="font-bold" href="{{ route('login') }}">login</a> or <a class ="font-bold" href="{{ route('register') }}">register</a> !</p></div>
                        </div>

           

     
            </div>
        </div>
        <footer>
            <p class="my-shadow absolute bottom-0 left-0 bg-gray-100 text-sm text-gray-500 p-7">&copy; Copyright {{ date('Y') }} Appointy</p>
         </footer>
    </body>
</html>

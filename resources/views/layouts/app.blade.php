<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">


    <title>Indian Council of Medical Research | Medical Equipments Repository Facility (MERF)</title>

    <!-- Styles -->
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">
</head>
<body class="h-screen font-light">
    <div id="app">

        @include('layouts.partials.navbar')

        <nav class="bg-white h-12 shadow mb-8 px-6 md:px-0 hidden">
            <div class="container mx-auto h-full">
                <div class="flex items-center justify-center h-12">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="flex-1 text-right">
                        @guest
                            <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ url('/login') }}">Login</a>
                            <a class="no-underline hover:underline text-grey-darker text-sm" href="{{ url('/register') }}">Register</a>
                        @else
                            <span class="text-grey-darker text-sm pr-4">{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                                class="no-underline hover:underline text-grey-darker text-sm"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>


        @if( session()->has('message') )
        <div class="bg-blue-lightest border-t border-b border-blue text-blue-dark px-4 py-3" role="alert">
          <p class="font-bold"></p>
          <p class="text-sm">{{ session('message') }}</p>
        </div>
        @endif


        @yield('content')

        <footer class="containe bg-blue-darkest text-grey p-16">
            <div class="sm:flex mb-4">
                <div class="sm:w-1/3 h-auto">
                    Indian Council of Medical Research
                </div>
                <div class="sm:w-1/5 h-auto sm:mt-0 mt-8">
                    <ul class="list-reset leading-normal">
                        <li class="">
                            <a href="{{ route('home') }}" class="hover:text-grey-light text-grey-dark no-underline">Home</a>
                        </li>
                        <li class="">
                            <a href="{{ route('equipments.index') }}" class="hover:text-grey-light text-grey-dark no-underline">Equipments</a>
                        </li>
                        <li class="">
                            <a href="{{ route('institutes.index') }}" class="hover:text-grey-light text-grey-dark no-underline">Institutes</a>
                        </li>
                    </ul>
                </div>
                <div class="sm:w-1/5 h-auto sm:mt-0 mt-8">
                    <ul class="list-reset leading-normal">
                        <li class="">
                            <a href="{{ route('about') }}" class="hover:text-grey-light text-grey-dark no-underline">About MERF</a>
                        </li>
                        <li class="">
                            <a href="{{ route('contact') }}" class="hover:text-grey-light text-grey-dark no-underline">Contact</a>
                        </li>
                        <li class="">
                            <a href="{{ route('terms') }}" class="hover:text-grey-light text-grey-dark no-underline">Terms</a>
                        </li>
                        <li class="">
                            <a href="{{ route('privacy') }}" class="hover:text-grey-light text-grey-dark no-underline">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="sm:w-1/3 sm:mt-0 mt-8 h-auto">
                    <div class="text-red-light mb-2">+91-11-26588895</div>
                    <p class="text-grey-darker leading-normal">V. Ramalingaswami Bhawan, P.O. Box No. 4911, Ansari Nagar, New Delhi - 110029 </p>
                </div>

            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('after-script')
</body>
</html>

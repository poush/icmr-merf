<nav class="flex items-center justify-between flex-wrap bg-brand-darkest px-16 py-4">
    <div class="flex items-center flex-no-shrink text-white mr-6">
        <a href="{{ route('home') }}" class="text-lg flex no-underline text-white">
            <img src="{{ asset('/img/logo.png') }}" width="80px" height="80px" class=""/>
            <div class="flex flex-grow ml-4 py-4">
                <span class="block">
                    Indian Council of Medical Research
                <span class="mt-1 block text-base text-brand-lighter">Medical Equipments Repository Facility (MERF)</span>
                </span>
            </div>
        </a>
    </div>

    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    
    <div class="w-full block text-right flex-grow lg:flex lg:items-center lg:w-auto">

        <div class="text-sm lg:flex-grow">
            <a href="{{ route('home') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white no-underline text-lg hover:text-brand-lighter mr-6">
                Home
            </a>
            <a href="{{ route('about') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white no-underline text-lg hover:text-brand-lighter mr-6">
                About
            </a>
            <a href="{{ route('equipments.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white no-underline text-lg hover:text-brand-lighter mr-6">
                Equipments
            </a>
            <a href="{{ route('help') }}" class="block mt-4 lg:inline-block lg:mt-0 text-white no-underline text-lg hover:text-brand-lighter mr-6">
                Help
            </a>

            @guest
                <a class="block mt-4 lg:inline-block lg:mt-0 text-white no-underline text-lg hover:text-brand-lighter mr-6" href="{{ url('/login') }}">Login</a>
                <!-- <a class="no-underline hover:underline text-white text-sm" href="{{ url('/register') }}">Register</a> -->
            @else
                <a class="block mt-4 lg:inline-block lg:mt-0 text-white no-underline text-lg hover:text-brand-lighter mr-6" href="{{ route('admin.dashboard') }}">Dashboard</a>
            @endif
        </div>
    </div>
</nav>

@if( !auth()->guest() && request()->route()->named('admin*') )

    <section class="py-4 px-16 text-center bg-grey-light">
        <div class="">
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <p class="text-grey-darker text-sm float-left" >Hi, {{ Auth::user()->name }}</p>
                <div class="text-sm lg:flex-grow text-right">
    
                    @can('manage-users')
                        <a href="{{ route('admin.users.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-dark no-underline text-lg hover:text-black mr-6">
                            Users
                        </a>
                    @endcan

                    @can('manage-categories')
                    <a href="{{ route('admin.categories.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-dark no-underline text-lg hover:text-black mr-6">
                        Categories
                    </a>
                    @endcan

                    @can('manage-equipments')
                    <a href="{{ route('admin.equipments.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-dark no-underline text-lg hover:text-black mr-6">
                        Equipments
                    </a>
                    @endcan

                    @can('manage-institutes')
                    <a href="{{ route('admin.institutes.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-dark no-underline text-lg hover:text-black mr-6">
                        Institutes
                    </a>
                    @endcan
    

                    <a href="{{ route('logout') }}" class="block mt-4 lg:inline-block lg:mt-0 text-blue-dark no-underline text-lg hover:text-black mr-6" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </section>


@endif

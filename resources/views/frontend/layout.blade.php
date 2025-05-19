<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Rental - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 ">
    <nav class="bg-white dark:bg-gray-800 shadow border-b border-b-gray-300 dark:border-b-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('frontend.home') }}" class="text-xl font-bold text-gray-900 dark:text-white">
                        <!-- <img src="{{ asset('storage/logo.png') }}" alt="Car Rental" class="h-24"> -->

                        <h2>Car Rental</h2>

                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('frontend.home') }}" class="px-3 py-2 text-sm font-medium @if(request()->routeIs('frontend.home')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">Home</a>
                    <a href="{{ route('frontend.cars.index') }}" class="px-3 py-2 text-sm font-medium @if(request()->routeIs('frontend.cars.*')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">Cars</a>
                    <a href="{{ route('frontend.about') }}" class="px-3 py-2 text-sm font-medium @if(request()->routeIs('frontend.about')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">About</a>
                    <a href="{{ route('frontend.contact') }}" class="px-3 py-2 text-sm font-medium @if(request()->routeIs('frontend.contact')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">Contact</a>

                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300">
                                Admin Dashboard
                            </a>
                        @endif
                    @endauth
                </div>
                <div class="flex items-center">
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5 mr-2">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    @auth
                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span class="sr-only">Open user menu</span>
                                <span class="text-gray-700 dark:text-gray-300 mr-2">{{ Auth::user()->name }}</span>
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="">
                            </button>
                            <div id="user-menu" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                                <a href="{{ route('frontend.rentals.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">My Rentals</a>
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-purple-600 dark:text-purple-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Admin Dashboard
                                    </a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 w-full text-left">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Login</a>
                        <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="md:hidden bg-white dark:bg-gray-800 shadow-md">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('frontend.home') }}" class="block px-3 py-2 rounded-md text-base font-medium @if(request()->routeIs('frontend.home')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">Home</a>
            <a href="{{ route('frontend.cars.index') }}" class="block px-3 py-2 rounded-md text-base font-medium @if(request()->routeIs('frontend.cars.*')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">Cars</a>
            <a href="{{ route('frontend.about') }}" class="block px-3 py-2 rounded-md text-base font-medium @if(request()->routeIs('frontend.about')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">About</a>
            <a href="{{ route('frontend.contact') }}" class="block px-3 py-2 rounded-md text-base font-medium @if(request()->routeIs('frontend.contact')) text-blue-600 dark:text-blue-400 @else text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 @endif">Contact</a>

            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300">
                        Admin Dashboard
                    </a>
                @endif
            @endauth
        </div>
    </div>
    <main>
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="p-4 bg-green-100 border border-green-200 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="p-4 bg-red-100 border border-red-200 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>
    <footer class="bg-white dark:bg-gray-800 shadow mt-12 border-t border-t-gray-300 dark:border-t-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex justify-center md:order-2 space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400 dark:text-gray-500">
                        &copy; {{ date('Y') }} Car Rental. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('theme-toggle').addEventListener('click', function() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                localStorage.theme = 'light';
                document.documentElement.classList.remove('dark');
            } else {
                localStorage.theme = 'dark';
                document.documentElement.classList.add('dark');
            }
        });

        if (document.getElementById('user-menu-button')) {
            document.getElementById('user-menu-button').addEventListener('click', function() {
                document.getElementById('user-menu').classList.toggle('hidden');
            });
            document.addEventListener('click', function(event) {
                if (!event.target.closest('#user-menu-button') && !event.target.closest('#user-menu')) {
                    document.getElementById('user-menu').classList.add('hidden');
                }
            });
        }
    </script>
</body>
</html>

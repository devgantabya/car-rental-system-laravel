<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - @yield('title')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-gray-900 dark:text-white">
                            Car Rental Admin
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('frontend.home') }}" class="px-3 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                            View Frontend
                        </a>
                        
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Open user menu</span>
                                <span class="text-gray-700 dark:text-gray-300 mr-2">{{ Auth::user()->name }}</span>
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF" alt="">
                            </button>
                            <div id="user-menu" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                                <a href="{{ route('frontend.home') }}" class="block px-4 py-2 text-sm text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    View Frontend
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 w-full text-left">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex flex-1">
            <div class="hidden md:flex md:flex-shrink-0">
                <div class="flex flex-col w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">
                    <div class="h-0 flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <nav class="flex-1 px-2 space-y-1">
                            <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->routeIs('admin.dashboard')) bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white @else text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 @endif">
                                <svg class="mr-3 h-5 w-5 @if(request()->routeIs('admin.dashboard')) text-gray-500 dark:text-gray-400 @else text-gray-400 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-gray-400 @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                Dashboard
                            </a>
                            
                            <a href="{{ route('admin.cars.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->routeIs('admin.cars.*')) bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white @else text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 @endif">
                                <svg class="mr-3 h-5 w-5 @if(request()->routeIs('admin.cars.*')) text-gray-500 dark:text-gray-400 @else text-gray-400 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-gray-400 @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1v-1a1 1 0 011-1h2a1 1 0 011 1v1a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H19a1 1 0 001-1V5a1 1 0 00-1-1H3z" />
                                </svg>
                                Cars
                            </a>
                            
                            <a href="{{ route('admin.rentals.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->routeIs('admin.rentals.*')) bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white @else text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 @endif">
                                <svg class="mr-3 h-5 w-5 @if(request()->routeIs('admin.rentals.*')) text-gray-500 dark:text-gray-400 @else text-gray-400 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-gray-400 @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                Rentals
                            </a>
                            
                            <a href="{{ route('admin.customers.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md @if(request()->routeIs('admin.customers.*')) bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white @else text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-700 @endif">
                                <svg class="mr-3 h-5 w-5 @if(request()->routeIs('admin.customers.*')) text-gray-500 dark:text-gray-400 @else text-gray-400 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-gray-400 @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                </svg>
                                Customers
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="flex-1 overflow-auto">
                <main class="p-6">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @yield('scripts')
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
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-menu').classList.toggle('hidden');
        });
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#user-menu-button') && !event.target.closest('#user-menu')) {
                document.getElementById('user-menu').classList.add('hidden');
            }
        });
    </script>
</body>
</html>
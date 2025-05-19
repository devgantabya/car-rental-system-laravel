@extends('frontend.layout')

@section('title', 'Home')

@section('content')
<div class="relative bg-gray-900">
    <!-- Background image with overlay -->
    <div class="absolute inset-0">
        <img src="/hero section car.jpg" alt="Feature Car" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gray-900 opacity-60"></div>
    </div>

    <!-- Hero content -->
    <div class="relative z-10 max-w-7xl mx-auto flex items-center justify-center h-screen px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white">
                Rent the Perfect Car for Your Journey
            </h1>
            <p class="mt-6 text-lg sm:text-xl text-gray-200 max-w-2xl mx-auto">
                Explore our diverse range of vehicles for your next journey — reliable, high-quality cars at budget-friendly prices.
            </p>
            <div class="mt-8">
                <a href="{{ route('frontend.cars.index') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md shadow-md transition">
                    View All Cars
                </a>
            </div>
        </div>
    </div>
</div>


<div class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">Why Choose Our Services</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 sm:mt-4">We provide the best car rental experience</p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-3">
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Affordable Prices</h3>
                <p class="mt-2 text-base text-gray-500 dark:text-gray-300">Competitive rates with no hidden fees.</p>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Reliable Service</h3>
                <p class="mt-2 text-base text-gray-500 dark:text-gray-300">24/7 support and well-maintained vehicles.</p>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Flexible Options</h3>
                <p class="mt-2 text-base text-gray-500 dark:text-gray-300">Wide range of vehicles to suit your needs.</p>
            </div>
        </div>
    </div>
</div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">Voices of Our Valued Customers</h2>
        <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 sm:mt-4">Hear from our satisfied customers</p>
    </div>

    <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-600 dark:text-gray-300 font-medium">E</span>
                </div>
                <div class="ml-4">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Emily R.</h4>
                    <div class="flex mt-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">"Super smooth rental process and the car was spotless. Highly recommend!"</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-600 dark:text-gray-300 font-medium">C</span>
                </div>
                <div class="ml-4">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Carlos M.</h4>
                    <div class="flex mt-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">"Affordable rates and friendly staff. Made my trip stress-free."</p>
        </div>

               <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-600 dark:text-gray-300 font-medium">N</span>
                </div>
                <div class="ml-4">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Nathan K.</h4>
                    <div class="flex mt-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">"Top-notch experience from start to finish. The car ran perfectly."</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-600 dark:text-gray-300 font-medium">S</span>
                </div>
                <div class="ml-4">
                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Sophie L.</h4>
                    <div class="flex mt-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">"The vehicle was in excellent condition and pickup was quick and easy. Will rent again!"</p>
        </div>
    </div>
</div>
@endsection

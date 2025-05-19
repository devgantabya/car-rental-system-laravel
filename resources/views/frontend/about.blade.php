@extends('frontend.layout')

@section('title', 'About Us')

@section('content')
<div class="bg-white dark:bg-gray-900 pt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="lg:col-span-6">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">Get to Know Our Rental Service</h2>
                <p class="mt-3 text-lg text-gray-500 dark:text-gray-300">Experience premium car rental services designed with your satisfaction in mind. We’re committed to delivering quality, comfort, and convenience every step of the way.</p>

                <div class="mt-10">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Our Mission</h4>
                            <p class="mt-2 text-base text-gray-500 dark:text-gray-400">To offer dependable, budget-friendly, and easy-to-access car rentals, ensuring a smooth journey from reservation to return.</p>
                        </div>
                    </div>

                    <div class="flex mt-10">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Simple & Quick Booking</h4>
                            <p class="mt-2 text-base text-gray-500 dark:text-gray-400">Reserve your ride in minutes with our user-friendly booking system—no hassle, just a few easy steps.</p>
                        </div>
                    </div>

                    <div class="flex mt-10">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900 dark:text-white">Diverse Fleet</h4>
                            <p class="mt-2 text-base text-gray-500 dark:text-gray-400">From fuel-efficient compacts to roomy SUVs, we have the perfect vehicle for every trip and every traveler.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 lg:mt-0 lg:col-span-6">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <img class="w-full h-auto" src="/car-in-about-page.webp" alt="Car Rental Service">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">The Faces Behind Our Service</h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300 sm:mt-4">Committed to delivering excellence every day.</p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                <div class="h-48 bg-gray-200 dark:bg-gray-600">
                    <img class="w-full h-full object-cover" src="/images/emily-carter.webp" alt="Team member">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Emily Carter</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Chief Executive Officer & Founder</p>
                    <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Emily launched the company in 2010 with a bold vision to modernize car rentals. Her leadership continues to drive innovation and customer-first solutions across the business.</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                <div class="h-48 bg-gray-200 dark:bg-gray-600">
                    <img class="w-full h-full object-cover" src="/images/michael-reyes.avif" alt="Team member">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Michael Reyes</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Operations Manager</p>
                    <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Michael ensures our operations run like clockwork. From fleet logistics to service coordination, he keeps everything running smoothly so our customers enjoy a seamless experience.</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                <div class="h-48 bg-gray-200 dark:bg-gray-600">
                    <img class="w-full h-full object-cover" src="/images/laura-bennett.jpg" alt="Team member">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Laura Bennett</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Customer Experience Manager</p>
                    <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Laura leads the support team with a focus on responsiveness and care. Her goal is to ensure that every customer feels supported, informed, and valued at every step.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-3">
            <div class="text-center">
                <p class="text-4xl font-extrabold text-white sm:text-5xl">10+</p>
                <p class="mt-2 text-lg font-medium text-blue-100">Years in Business</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-extrabold text-white sm:text-5xl">500+</p>
                <p class="mt-2 text-lg font-medium text-blue-100">Happy Customers</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-extrabold text-white sm:text-5xl">50+</p>
                <p class="mt-2 text-lg font-medium text-blue-100">Vehicles in Fleet</p>
            </div>
        </div>
    </div>
</div>
@endsection

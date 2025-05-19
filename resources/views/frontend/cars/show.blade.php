@extends('frontend.layout')

@section('title', $car->name)

@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
            <div>
                <div class="bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden">
                    <img src="{{ $car->image_url }}" alt="{{ $car->name }}" class="w-full h-auto">
                </div>
            </div>
            <div class="mt-8 lg:mt-0">
                <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $car->name }}</h1>
                <p class="mt-2 text-lg text-gray-500 dark:text-gray-400">{{ $car->brand }} {{ $car->model }} • {{ $car->year }}</p>
                
                <div class="mt-6 flex items-center">
                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">{{ $car->car_type }}</span>
                    <span class="ml-4 text-2xl font-bold text-gray-900 dark:text-white">${{ $car->daily_rent_price }}/day</span>
                </div>
                
                <div class="mt-8">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Description</h2>
                    <p class="mt-4 text-gray-500 dark:text-gray-400">
                        This {{ $car->brand }} {{ $car->model }} is a {{ $car->car_type }} manufactured in {{ $car->year }}. 
                        It's perfect for your next trip with comfortable seating and excellent fuel efficiency.
                    </p>
                </div>
                
                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Brand</h3>
                        <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $car->brand }}</p>
                    </div>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Model</h3>
                        <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $car->model }}</p>
                    </div>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Year</h3>
                        <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $car->year }}</p>
                    </div>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Type</h3>
                        <p class="mt-1 text-sm font-medium text-gray-900 dark:text-white">{{ $car->car_type }}</p>
                    </div>
                </div>
                
                <div class="mt-8">
                    @auth
                        <a href="{{ route('frontend.rentals.create', $car->id) }}" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700">Rent This Car</a>
                    @else
                        <a href="{{ route('login') }}" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700">Login to Rent</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Similar Cars</h2>
        
        <div class="mt-6 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $similarCars = App\Models\Car::where('car_type', $car->car_type)
                    ->where('id', '!=', $car->id)
                    ->where('availability', true)
                    ->inRandomOrder()
                    ->take(3)
                    ->get();
            @endphp
            
            @forelse($similarCars as $similarCar)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow overflow-hidden">
                    <div class="h-48 bg-gray-200 dark:bg-gray-600">
                        <img src="{{ $similarCar->image_url }}" alt="{{ $similarCar->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $similarCar->name }}</h3>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">{{ $similarCar->car_type }}</span>
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $similarCar->brand }} {{ $similarCar->model }} • {{ $similarCar->year }}</p>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">${{ $similarCar->daily_rent_price }}/day</p>
                        </div>
                        <div class="mt-6">
                            <a href="{{ route('frontend.cars.show', $similarCar->id) }}" class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-8">
                    <p class="text-gray-500 dark:text-gray-400">No similar cars found.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
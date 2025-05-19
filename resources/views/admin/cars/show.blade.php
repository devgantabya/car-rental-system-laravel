@extends('admin.layout')

@section('title', 'Car Details')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-1/3">
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden">
                    <img src="{{ $car->image_url }}" alt="{{ $car->name }}" class="w-full h-auto object-cover">
                </div>
            </div>
            
            <div class="w-full md:w-2/3">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $car->name }}</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Brand</h4>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $car->brand }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Model</h4>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $car->model }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Year</h4>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $car->year }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Car Type</h4>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $car->car_type }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Daily Rent Price</h4>
                        <p class="mt-1 text-sm text-gray-900 dark:text-white">${{ number_format($car->daily_rent_price, 2) }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Availability</h4>
                        <p class="mt-1">
                            @if($car->availability)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                    Available
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                                    Not Available
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h4>
                    <p class="mt-1 text-sm text-gray-900 dark:text-white">This {{ $car->brand }} {{ $car->model }} is a {{ $car->car_type }} manufactured in {{ $car->year }}. It's available for rent at ${{ number_format($car->daily_rent_price, 2) }} per day.</p>
                </div>
                
                <div class="mt-6 flex space-x-3">
                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Edit Car
                    </a>
                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition" onclick="return confirm('Are you sure you want to delete this car?')">
                            Delete Car
                        </button>
                    </form>
                    <a href="{{ route('admin.cars.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                        Back to Cars
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
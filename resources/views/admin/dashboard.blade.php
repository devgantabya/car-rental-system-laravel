@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Cars</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $totalCars }}</p>
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Available Cars</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $availableCars }}</p>
                </div>
                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Rentals</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $totalRentals }}</p>
                </div>
                <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Earnings</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">${{ number_format($totalEarnings, 2) }}</p>
                </div>
                <div class="bg-yellow-100 dark:bg-yellow-900 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Recent Rentals</h3>
        </div>
        <div class="divide-y divide-gray-200 dark:divide-gray-700">
            @php
                $recentRentals = App\Models\Rental::with(['user', 'car'])->latest()->take(5)->get();
            @endphp
            
            @if($recentRentals->isEmpty())
                <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                    No rentals found.
                </div>
            @else
                @foreach($recentRentals as $rental)
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                    <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{ $rental->car->name }} ({{ $rental->car->brand }})</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Rented by {{ $rental->user->name }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">${{ number_format($rental->total_cost, 2) }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $rental->start_date->format('M d, Y') }} - {{ $rental->end_date->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
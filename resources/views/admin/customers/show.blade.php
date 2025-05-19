@extends('admin.layout')

@section('title', 'Customer Details')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Customer Details</h3>
            <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                Back to Customers
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-1">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <div class="h-20 w-20 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center mb-4">
                            <span class="text-2xl text-gray-600 dark:text-gray-300 font-medium">{{ substr($customer->name, 0, 1) }}</span>
                        </div>
                        <h4 class="text-lg font-medium text-gray-900 dark:text-white">{{ $customer->name }}</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $customer->email }}</p>
                    </div>
                    
                    <div class="mt-6 space-y-3">
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Phone</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $customer->phone ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Address</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $customer->address ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Member Since</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $customer->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Rentals</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $customer->rentals()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="md:col-span-2">
                <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Rental History</h4>
                
                @if($rentals->isEmpty())
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 text-center text-gray-500 dark:text-gray-400">
                        No rental history found.
                    </div>
                @else
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-100 dark:bg-gray-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Car</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Dates</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total Cost</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach($rentals as $rental)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10 rounded-md overflow-hidden">
                                                        <img src="{{ $rental->car->image_url }}" alt="{{ $rental->car->name }}" class="h-full w-full object-cover">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $rental->car->name }}</div>
                                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $rental->car->brand }} {{ $rental->car->model }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">{{ $rental->start_date->format('M d, Y') }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">to {{ $rental->end_date->format('M d, Y') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900 dark:text-white">${{ number_format($rental->total_cost, 2) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($rental->status == 'pending')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                                                        Pending
                                                    </span>
                                                @elseif($rental->status == 'ongoing')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                                        Ongoing
                                                    </span>
                                                @elseif($rental->status == 'completed')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                                        Completed
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                                                        Canceled
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
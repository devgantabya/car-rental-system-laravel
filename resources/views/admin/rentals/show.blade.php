@extends('admin.layout')

@section('title', 'Rental Details')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Rental #{{ $rental->id }}</h3>
            <div>
                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                    @if($rental->status == 'pending') bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200
                    @elseif($rental->status == 'ongoing') bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200
                    @elseif($rental->status == 'completed') bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200
                    @else bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 @endif">
                    {{ ucfirst($rental->status) }}
                </span>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Customer Information</h4>
                
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                            <span class="text-gray-600 dark:text-gray-300 font-medium">{{ substr($rental->user->name, 0, 1) }}</span>
                        </div>
                        <div class="ml-4">
                            <h5 class="text-sm font-medium text-gray-900 dark:text-white">{{ $rental->user->name }}</h5>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $rental->user->email }}</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Phone</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $customer->phone ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Address</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $customer->address ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Customer Since</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $rental->user->created_at->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Rentals</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $rental->user->rentals()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Rental Information</h4>
                
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 h-10 w-10 rounded-md overflow-hidden">
                            <img src="{{ $rental->car->image_url }}" alt="{{ $rental->car->name }}" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h5 class="text-sm font-medium text-gray-900 dark:text-white">{{ $rental->car->name }}</h5>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $rental->car->brand }} {{ $rental->car->model }}</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Rental Dates</p>
                            <p class="text-sm text-gray-900 dark:text-white">
                                {{ $rental->start_date->format('M d, Y') }} to {{ $rental->end_date->format('M d, Y') }}
                                ({{ $rental->start_date->diffInDays($rental->end_date) }} days)
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Daily Rate</p>
                            <p class="text-sm text-gray-900 dark:text-white">${{ number_format($rental->car->daily_rent_price, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Total Cost</p>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">${{ number_format($rental->total_cost, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Booked On</p>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $rental->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8">
            <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Update Rental Status</h4>
            
           <form action="{{ route('admin.rentals.update-status', $rental->id) }}" method="POST" class="max-w-md">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                    <select name="status" id="status" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="pending" @if($rental->status == 'pending') selected @endif>Pending</option>
                        <option value="ongoing" @if($rental->status == 'ongoing') selected @endif>Ongoing</option>
                        <option value="completed" @if($rental->status == 'completed') selected @endif>Completed</option>
                        <option value="canceled" @if($rental->status == 'canceled') selected @endif>Canceled</option>
                    </select>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.rentals.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                        Back to Rentals
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Update Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('frontend.layout')

@section('title', 'Rent ' . $car->name)

@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
            <!-- Car Summary -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Rent {{ $car->name }}</h2>
                <p class="mt-2 text-lg text-gray-500 dark:text-gray-400">{{ $car->brand }} {{ $car->model }} • {{ $car->year }}</p>
                
                <div class="mt-6 bg-gray-50 dark:bg-gray-800 rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-16 w-16 rounded-md overflow-hidden">
                            <img src="{{ $car->image_url }}" alt="{{ $car->name }}" class="h-full w-full object-cover">
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $car->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $car->car_type }}</p>
                            <p class="mt-1 text-lg font-medium text-gray-900 dark:text-white">${{ $car->daily_rent_price }}/day</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 grid grid-cols-2 gap-4">
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
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Type</h4>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $car->car_type }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Rental Form -->
            <div class="mt-8 lg:mt-0">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Rental Details</h3>
                        
                        <form action="{{ route('frontend.rentals.store', $car->id) }}" method="POST" class="mt-6 space-y-6">
                            @csrf
                            
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                                <input type="date" name="start_date" id="start_date" min="{{ date('Y-m-d') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                @error('start_date')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                                <!-- CHANGED: Removed the static min attribute -->
                                <input type="date" name="end_date" id="end_date" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                @error('end_date')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300">Estimated Cost</h4>
                                <p class="mt-2 text-gray-500 dark:text-gray-400">Your total cost will be calculated after selecting dates.</p>
                                <p id="estimated_cost" class="mt-1 text-xl font-medium text-gray-900 dark:text-white">$0.00</p>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Confirm Rental
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const estimatedCostElement = document.getElementById('estimated_cost');
        const dailyRate = {{ $car->daily_rent_price }};
        
        // CHANGED: Initialize end date min to tomorrow
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        endDateInput.min = tomorrow.toISOString().split('T')[0];
        
        function calculateCost() {
            if (startDateInput.value && endDateInput.value) {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                
                if (startDate >= endDate) {
                    estimatedCostElement.textContent = 'Invalid dates';
                    return;
                }
                
                const diffTime = Math.abs(endDate - startDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                const totalCost = diffDays * dailyRate;
                
                estimatedCostElement.textContent = '$' + totalCost.toFixed(2) + ' for ' + diffDays + ' days';
            }
        }
        
        startDateInput.addEventListener('change', function() {
            if (this.value) {
                // CHANGED: Set end date min to the day after selected start date
                const nextDay = new Date(this.value);
                nextDay.setDate(nextDay.getDate() + 1);
                endDateInput.min = nextDay.toISOString().split('T')[0];
                
                // Clear end date if it's now invalid
                if (endDateInput.value && new Date(endDateInput.value) < nextDay) {
                    endDateInput.value = '';
                    estimatedCostElement.textContent = '$0.00';
                }
            }
            calculateCost();
        });
        
        endDateInput.addEventListener('change', calculateCost);
    });
</script>
@endsection
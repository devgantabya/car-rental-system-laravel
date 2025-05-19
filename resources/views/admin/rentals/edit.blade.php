@extends('admin.layout')

@section('title', 'Edit Rental')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Rental #{{ $rental->id }}</h2>
</div>

<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Customer</label>
                    <select name="user_id" id="user_id" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('user_id', $rental->user_id) == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }} ({{ $customer->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="car_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Car</label>
                    <select name="car_id" id="car_id" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                        <option value="">Select Car</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}" data-daily-price="{{ $car->daily_rent_price }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                                {{ $car->name }} ({{ $car->brand }}, {{ $car->model }}) - ${{ $car->daily_rent_price }}/day
                            </option>
                        @endforeach
                    </select>
                    @error('car_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Date</label>
                    <input type="date" name="start_date" id="start_date" 
                           value="{{ old('start_date', $rental->start_date->format('Y-m-d')) }}" 
                           min="{{ $rental->start_date->format('Y-m-d') }}" 
                           class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                    @error('start_date')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End Date</label>
                    <input type="date" name="end_date" id="end_date" 
                           value="{{ old('end_date', $rental->end_date->format('Y-m-d')) }}" 
                           min="{{ $rental->start_date->copy()->addDay()->format('Y-m-d') }}" 
                           class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                    @error('end_date')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select name="status" id="status" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm" required>
                        <option value="pending" {{ $rental->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ongoing" {{ $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled" {{ $rental->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Total Cost</label>
                    <div class="w-full p-2 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-300" id="total_cost_display">
                        ${{ number_format($rental->total_cost, 2) }}
                    </div>
                    <input type="hidden" name="total_cost" id="total_cost" value="{{ $rental->total_cost }}">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Calculated automatically based on car price and rental duration.</p>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.rentals.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 focus:bg-gray-300 dark:focus:bg-gray-600 active:bg-gray-200 dark:active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Update Rental
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const carSelect = document.getElementById('car_id');
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const totalCostDisplay = document.getElementById('total_cost_display');
    const totalCostInput = document.getElementById('total_cost');

    if (!carSelect || !startDateInput || !endDateInput || !totalCostInput) {
        console.error('One or more input elements are missing.');
        return;
    }

    const carPrices = {};
    @foreach($cars as $car)
        carPrices[{{ $car->id }}] = {{ $car->daily_rent_price }};
    @endforeach

    function calculateTotalCost() {
        const carId = carSelect.value;
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (!carId || isNaN(startDate) || isNaN(endDate)) {
            totalCostDisplay.textContent = '$0.00';
            totalCostInput.value = 0;
            return;
        }

        if (endDate > startDate) {
            const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
            const rate = carPrices[carId] || 0;
            const total = days * rate;

            totalCostDisplay.textContent = '$' + total.toFixed(2);
            totalCostInput.value = total.toFixed(2);
        } else {
            totalCostDisplay.textContent = '$0.00';
            totalCostInput.value = 0;
        }
    }

    function updateEndDateMin() {
        if (startDateInput.value) {
            const start = new Date(startDateInput.value);
            start.setDate(start.getDate() + 1);
            endDateInput.min = start.toISOString().split('T')[0];

            if (endDateInput.value && new Date(endDateInput.value) <= new Date(startDateInput.value)) {
                endDateInput.value = '';
            }
        }
    }

    carSelect.addEventListener('change', calculateTotalCost);
    startDateInput.addEventListener('change', () => {
        updateEndDateMin();
        calculateTotalCost();
    });
    endDateInput.addEventListener('change', calculateTotalCost);

    updateEndDateMin();
    calculateTotalCost();
});
</script>
@endsection
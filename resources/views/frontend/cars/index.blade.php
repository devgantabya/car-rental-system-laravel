@extends('frontend.layout')

@section('title', 'Our Cars')

@section('content')
<div class="bg-white dark:bg-gray-900">
    <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-col gap-6 md:items-left md:justify-between">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Our Car Collection</h2>
            <div class="mt-4 md:mt-0">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div>
                        <label for="brand" class="sr-only">Brand</label>
                        <select name="brand" id="brand" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">All Brands</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand }}" @if(request('brand') == $brand) selected @endif>{{ $brand }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="car_type" class="sr-only">Type</label>
                        <select name="car_type" id="car_type" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">All Types</option>
                            @foreach($carTypes as $type)
                                <option value="{{ $type }}" @if(request('car_type') == $type) selected @endif>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <div>
                            <label for="min_price" class="sr-only">Min Price</label>
                            <input type="number" name="min_price" id="min_price" placeholder="Min $" value="{{ request('min_price') }}" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="max_price" class="sr-only">Max Price</label>
                            <input type="number" name="max_price" id="max_price" placeholder="Max $" value="{{ request('max_price') }}" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="cars-container" class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @include('frontend.cars.partials.cars_list', ['cars' => $cars])
        </div>

        <div id="pagination-container" class="mt-8">
            @include('frontend.cars.partials.pagination', ['cars' => $cars])
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const brandSelect = document.getElementById('brand');
    const carTypeSelect = document.getElementById('car_type');
    const minPriceInput = document.getElementById('min_price');
    const maxPriceInput = document.getElementById('max_price');
    const carsContainer = document.getElementById('cars-container');
    const paginationContainer = document.getElementById('pagination-container');

    function applyFilters() {
        const params = new URLSearchParams();

        if (brandSelect.value) params.append('brand', brandSelect.value);
        if (carTypeSelect.value) params.append('car_type', carTypeSelect.value);
        if (minPriceInput.value) params.append('min_price', minPriceInput.value);
        if (maxPriceInput.value) params.append('max_price', maxPriceInput.value);

        params.append('ajax', '1');

        fetch(`{{ route('frontend.cars.index') }}?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                carsContainer.innerHTML = data.html;
                paginationContainer.innerHTML = data.pagination;
            } else {
                console.error('Error:', data.message);
                carsContainer.innerHTML = `<div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 dark:text-gray-400">Error loading cars. Please try again.</p>
                </div>`;
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            carsContainer.innerHTML = `<div class="col-span-3 text-center py-12">
                <p class="text-gray-500 dark:text-gray-400">Error loading cars. Please try again.</p>
            </div>`;
        });
    }
    [brandSelect, carTypeSelect].forEach(element => {
        element.addEventListener('change', applyFilters);
    });
    let priceTimeout;
    [minPriceInput, maxPriceInput].forEach(element => {
        element.addEventListener('input', () => {
            clearTimeout(priceTimeout);
            priceTimeout = setTimeout(applyFilters, 500);
        });
    });
});
</script>
@endsection

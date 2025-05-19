@forelse($cars as $car)
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div class="h-48 bg-gray-200 dark:bg-gray-700">
            <img src="{{ $car->image_url }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $car->name }}</h3>
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">{{ $car->car_type }}</span>
            </div>
            <div class="mt-2 flex items-center justify-between">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $car->brand }} {{ $car->model }} • {{ $car->year }}</p>
                <p class="text-sm font-medium text-gray-900 dark:text-white">${{ $car->daily_rent_price }}/day</p>
            </div>
            <div class="mt-6 flex justify-between">
                <a href="{{ route('frontend.cars.show', $car->id) }}" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">View Details</a>
                @auth
                    <a href="{{ route('frontend.rentals.create', $car->id) }}" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">Book Now</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">Login to Book</a>
                @endauth
            </div>
        </div>
    </div>
@empty
    <div class="col-span-3 text-center py-12">
        <p class="text-gray-500 dark:text-gray-400">No cars found matching your criteria.</p>
    </div>
@endforelse

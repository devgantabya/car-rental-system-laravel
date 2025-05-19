@extends('admin.layout')

@section('title', 'Manage Cars')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Manage Cars</h2>
    <a href="{{ route('admin.cars.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        Add New Car
    </a>
</div>

<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Brand/Model</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($cars as $car)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-md object-cover" src="{{ $car->image_url }}" alt="{{ $car->name }}">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $car->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $car->brand }} {{ $car->model }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $car->year }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                {{ $car->car_type }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">${{ $car->daily_rent_price }}/day</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($car->availability)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                    Available
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                                    Not Available
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.cars.show', $car->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500 mr-3">View</a>
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-500 mr-3">Edit</a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-500" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No cars found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Showing {{ $cars->firstItem() }} to {{ $cars->lastItem() }} of {{ $cars->total() }} results
            </div>
            <div class="flex space-x-1">
                @if ($cars->onFirstPage())
                    <span class="px-3 py-1 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-400 dark:text-gray-500 cursor-not-allowed">Previous</span>
                @else
                    <a href="{{ $cars->previousPageUrl() }}" class="px-3 py-1 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">Previous</a>
                @endif

                @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                    @if ($page == $cars->currentPage())
                        <span class="px-3 py-1 rounded-md bg-blue-600 text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($cars->hasMorePages())
                    <a href="{{ $cars->nextPageUrl() }}" class="px-3 py-1 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">Next</a>
                @else
                    <span class="px-3 py-1 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-400 dark:text-gray-500 cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
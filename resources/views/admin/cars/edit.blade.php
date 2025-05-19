@extends('admin.layout')

@section('title', 'Edit Car')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Car Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Brand</label>
                    <input type="text" name="brand" id="brand" value="{{ old('brand', $car->brand) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('brand')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Model</label>
                    <input type="text" name="model" id="model" value="{{ old('model', $car->model) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('model')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Year</label>
                    <input type="number" name="year" id="year" value="{{ old('year', $car->year) }}" min="1900" max="{{ date('Y') + 1 }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('year')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="car_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Car Type</label>
                    <select name="car_type" id="car_type" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="">Select Type</option>
                        <option value="SUV" @if(old('car_type', $car->car_type) == 'SUV') selected @endif>SUV</option>
                        <option value="Sedan" @if(old('car_type', $car->car_type) == 'Sedan') selected @endif>Sedan</option>
                        <option value="Hatchback" @if(old('car_type', $car->car_type) == 'Hatchback') selected @endif>Hatchback</option>
                        <option value="Coupe" @if(old('car_type', $car->car_type) == 'Coupe') selected @endif>Coupe</option>
                        <option value="Convertible" @if(old('car_type', $car->car_type) == 'Convertible') selected @endif>Convertible</option>
                        <option value="Minivan" @if(old('car_type', $car->car_type) == 'Minivan') selected @endif>Minivan</option>
                        <option value="Pickup" @if(old('car_type', $car->car_type) == 'Pickup') selected @endif>Pickup</option>
                    </select>
                    @error('car_type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="daily_rent_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Daily Rent Price ($)</label>
                    <input type="number" name="daily_rent_price" id="daily_rent_price" value="{{ old('daily_rent_price', $car->daily_rent_price) }}" min="0" step="0.01" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('daily_rent_price')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="availability" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Availability</label>
                    <select name="availability" id="availability" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="1" @if(old('availability', $car->availability)) selected @endif>Available</option>
                        <option value="0" @if(!old('availability', $car->availability)) selected @endif>Not Available</option>
                    </select>
                    @error('availability')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                    
                    <div class="mb-4">
                        <div id="currentImageContainer" class="{{ $car->image ? '' : 'hidden' }}">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Current Image:</p>
                            <img src="{{ $car->image_url }}" alt="Current Car Image" id="currentImage" class="h-40 w-auto rounded-md border border-gray-200 dark:border-gray-700">
                        </div>
                        <div id="imagePreviewContainer" class="hidden mt-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">New Image Preview:</p>
                            <img id="imagePreview" class="h-40 w-auto rounded-md border border-gray-200 dark:border-gray-700">
                        </div>
                    </div>
                    
                    <input type="file" name="image" id="image" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('admin.cars.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Update Car
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const currentImageContainer = document.getElementById('currentImageContainer');
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');
        
        if (imageInput) {
            imageInput.addEventListener('change', function(event) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        if (currentImageContainer) {
                            currentImageContainer.classList.add('hidden');
                        }
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                } else {
                    if (currentImageContainer) {
                        currentImageContainer.classList.remove('hidden');
                    }
                    previewContainer.classList.add('hidden');
                }
            });
        }
    });
</script>
@endsection
@extends('admin.layout')

@section('title', 'Add New Car')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Car Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Brand</label>
                    <input type="text" name="brand" id="brand" value="{{ old('brand') }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('brand')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Model</label>
                    <input type="text" name="model" id="model" value="{{ old('model') }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('model')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Year</label>
                    <input type="number" name="year" id="year" value="{{ old('year') }}" min="1900" max="{{ date('Y') + 1 }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('year')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="car_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Car Type</label>
                    <select name="car_type" id="car_type" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="">Select Type</option>
                        <option value="SUV" @if(old('car_type') == 'SUV') selected @endif>SUV</option>
                        <option value="Sedan" @if(old('car_type') == 'Sedan') selected @endif>Sedan</option>
                        <option value="Hatchback" @if(old('car_type') == 'Hatchback') selected @endif>Hatchback</option>
                        <option value="Coupe" @if(old('car_type') == 'Coupe') selected @endif>Coupe</option>
                        <option value="Convertible" @if(old('car_type') == 'Convertible') selected @endif>Convertible</option>
                        <option value="Minivan" @if(old('car_type') == 'Minivan') selected @endif>Minivan</option>
                        <option value="Pickup" @if(old('car_type') == 'Pickup') selected @endif>Pickup</option>
                    </select>
                    @error('car_type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="daily_rent_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Daily Rent Price ($)</label>
                    <input type="number" name="daily_rent_price" id="daily_rent_price" value="{{ old('daily_rent_price') }}" min="0" step="0.01" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('daily_rent_price')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="availability" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Availability</label>
                    <select name="availability" id="availability" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="1" @if(old('availability', true)) selected @endif>Available</option>
                        <option value="0" @if(!old('availability', true)) selected @endif>Not Available</option>
                    </select>
                    @error('availability')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                    <input type="file" name="image" id="image" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror

                    <div id="imagePreviewContainer" class="mt-4 hidden">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Image Preview:</p>
                        <img id="imagePreview" class="max-w-full h-auto rounded-lg border border-gray-200 dark:border-gray-700" style="max-height: 200px;">
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Add Car
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
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');
        
        if (imageInput) {
            imageInput.addEventListener('change', function(event) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = 'block';
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                } else {
                    previewContainer.style.display = 'none';
                }
            });
        }
    });
</script>
@endsection
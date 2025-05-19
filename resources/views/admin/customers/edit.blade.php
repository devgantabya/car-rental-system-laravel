@extends('admin.layout')

@section('title', 'Edit Customer')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Customer: {{ $customer->name }}</h3>
            <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                Back to Customers
            </a>
        </div>

        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" required
                           class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" required
                           class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}"
                           class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                    <textarea name="address" id="address" rows="2"
                              class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address', $customer->address) }}</textarea>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Update Customer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
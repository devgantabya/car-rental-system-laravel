<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'role' => 'customer',
        ]);

        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(User $customer)
    {
        if ($customer->role !== 'customer') {
            abort(404);
        }

        $rentals = $customer->rentals()->with('car')->latest()->paginate(5);
        return view('admin.customers.show', compact('customer', 'rentals'));
    }

    public function edit(User $customer)
    {
        if ($customer->role !== 'customer') {
            abort(404);
        }

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, User $customer)
    {
        if ($customer->role !== 'customer') {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(User $customer)
    {
        if ($customer->role !== 'customer') {
            abort(404);
        }

        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
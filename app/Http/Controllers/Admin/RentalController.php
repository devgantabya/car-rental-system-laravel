<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmation;
use App\Mail\AdminRentalNotification;
use Illuminate\Support\Facades\Log;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->latest()->paginate(10);
        return view('admin.rentals.index', compact('rentals'));
    }

    public function create()
    {
        $cars = Car::all();
        $customers = User::where('role', 'customer')->get();
        return view('admin.rentals.create', compact('cars', 'customers'));
    }

    /*public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:pending,ongoing,completed,canceled',
        ]);

        $car = Car::findOrFail($request->car_id);
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $days = $startDate->diff($endDate)->days;

        $validated['total_cost'] = $car->daily_rent_price * $days;
        Rental::create($validated);
        return redirect()->route('admin.rentals.index')->with('success', 'Rental created successfully.');
    }*/
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:pending,ongoing,completed,canceled',
        ]);

        $car = Car::findOrFail($request->car_id);
        $user = User::findOrFail($request->user_id);
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $days = $startDate->diff($endDate)->days;

        $validated['total_cost'] = $car->daily_rent_price * $days;

        try {
            $rental = Rental::create($validated);
            try {
                Mail::to($user->email)->send(new RentalConfirmation($rental));
                Mail::to('digonto@live.com')->send(new AdminRentalNotification($rental));
            } catch (\Exception $e) {
                \Log::error('Email sending failed: '.$e->getMessage());
            }

            return redirect()->route('admin.rentals.index')
                ->with('success', 'Rental created successfully. Confirmation emails sent.');

        } catch (\Exception $e) {
            \Log::error('Rental creation failed: '.$e->getMessage());
            return back()->with('error', 'Failed to create rental. Please try again.');
        }
    }

    public function show(Rental $rental)
    {
        return view('admin.rentals.show', compact('rental'));
    }

    public function edit(Rental $rental)
    {
        $cars = Car::all();
        $customers = User::where('role', 'customer')->get();
        return view('admin.rentals.edit', compact('rental', 'cars', 'customers'));
    }

    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:' . $rental->start_date->format('Y-m-d'),
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:pending,ongoing,completed,canceled',
        ]);

        $car = Car::findOrFail($request->car_id);
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $days = $startDate->diff($endDate)->days;

        $validated['total_cost'] = $car->daily_rent_price * $days;

        $rental->update($validated);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function updateStatus(Request $request, Rental $rental)
    {
        $request->validate([
            'status' => 'required|in:pending,ongoing,completed,canceled'
        ]);

        $rental->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.rentals.show', $rental->id)
            ->with('success', 'Rental status updated successfully!');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully.');
    }
}
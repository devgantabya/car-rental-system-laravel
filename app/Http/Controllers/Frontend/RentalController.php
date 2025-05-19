<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmation;
use App\Mail\AdminRentalNotification;
use Illuminate\Support\Facades\Log;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Auth::user()->rentals()->with('car')->latest()->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function create(Car $car)
    {
        return view('frontend.rentals.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $isAvailable = !Rental::where('car_id', $car->id)
            ->where(function($query) use ($validated) {
                $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhere(function($query) use ($validated) {
                        $query->where('start_date', '<=', $validated['start_date'])
                            ->where('end_date', '>=', $validated['end_date']);
                    });
            })
            ->where('status', '!=', 'canceled')
            ->exists();

        if (!$isAvailable) {
            return back()->with('error', 'The car is not available for the selected dates.');
        }

        $days = (strtotime($validated['end_date']) - strtotime($validated['start_date'])) / (60 * 60 * 24);
        $totalCost = $days * $car->daily_rent_price;

        try {
            $rental = Rental::create([
                'user_id' => Auth::id(),
                'car_id' => $car->id,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'total_cost' => $totalCost,
                'status' => 'pending',
            ]);

            try {
                Mail::to(Auth::user()->email)->send(new RentalConfirmation($rental));
                Mail::to('digonto@live.com')->send(new AdminRentalNotification($rental));
            } catch (\Exception $e) {
                Log::error('Email sending failed: '.$e->getMessage());
            }

            return redirect()->route('frontend.rentals.index')
                ->with('success', 'Car rented successfully! You should receive a confirmation email shortly.');

        } catch (\Exception $e) {
            Log::error('Rental creation failed: '.$e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function cancel(Rental $rental)
    {
        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }

        if ($rental->start_date <= now()) {
            return back()->with('error', 'You cannot cancel a rental that has already started.');
        }

        $rental->update(['status' => 'canceled']);

        return back()->with('success', 'Rental canceled successfully.');
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query()->where('availability', true);

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }

        if ($request->filled('min_price')) {
            $query->where('daily_rent_price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->max_price);
        }

        $cars = $query->latest()->paginate(9);

        if ($request->ajax()) {
            try {
                return response()->json([
                    'success' => true,
                    'html' => view('frontend.cars.partials.cars_list', compact('cars'))->render(),
                    'pagination' => view('frontend.cars.partials.pagination', compact('cars'))->render()
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error loading cars: ' . $e->getMessage()
                ], 500);
            }
        }

        $carTypes = Car::distinct()->pluck('car_type');
        $brands = Car::distinct()->pluck('brand');

        return view('frontend.cars.index', compact('cars', 'carTypes', 'brands'));
    }

    public function show(Car $car)
    {
        return view('frontend.cars.show', compact('car'));
    }
}
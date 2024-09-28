<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->car_type) {
            $query->where('car_type', $request->car_type);
        }

        if ($request->brand) {
            $query->where('brand', $request->brand);
        }

        if ($request->min_rent_price) {
            $minRentPrice = $request->min_rent_price;
            $query->where('daily_rent_price', '>=', $minRentPrice);
        }

        if ($request->max_rent_price) {
            $maxRentPrice = $request->max_rent_price;
            $query->where('daily_rent_price', '<=', $maxRentPrice);
        }

        $data['cars'] = $query->get();
        $data['brands'] = Car::where('availability', 1)->pluck('brand')->unique();
        $data['car_types'] = Car::where('availability', 1)->pluck('car_type')->unique();
        return view('frontend.index', $data);
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}

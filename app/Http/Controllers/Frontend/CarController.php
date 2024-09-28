<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Car;
use App\Mail\SendMail;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CarController extends Controller
{
    public function car_details($id){

        $data['car'] = Car::where('id', $id)->firstOrFail();

        return view('frontend.car_details',$data);
    }

    public function booking_car(Request $request){

        $already_rent = Rental::where('car_id', $request->car_id)
                            ->where('start_date', '<=', $request->end_date)
                            ->where('end_date', '>=',$request->start_date)
                            ->first();
        if($already_rent) {
            return redirect()->back()->with('error', 'Already rent');
        }

        $car = Car::where('id',$request->car_id)->firstOrFail();

        $rental =  new Rental();
        $rental->user_id = Auth::id();
        $rental->car_id = $request->car_id;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        $rental->total_cost = $car->daily_rent_price;
        $rental->save();

        Mail::to($rental->user->email)->send(new SendMail($rental));

        Mail::to('info@aribascare.com')->send(new SendMail($rental, true));

        return redirect()->back()->with('message', 'Successfully Confirmed This Car');
    }
}

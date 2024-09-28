<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{

    public function index(Request $request)
    {

        $customer = Auth::check() && Auth::user()->role === 'customer';

        if ($customer) {
            $rentals_history = Rental::where('user_id', Auth::id())->paginate(10);
        } else {
            $rentals_history = [];
        }

        $data['rentals_history'] = $rentals_history;
        $data['auth_user'] = Auth::user();
        return view('frontend.rental', $data);
    }

    public function cancel($id)
    {
        $rental = Rental::findOrFail($id);

        if (!$rental) {
            return redirect()->back()->withErrors('Rental not found.');
        }

        if (now()->lt($rental->start_date)) {
            $rental->status='canceled';
            $rental->save();
            return redirect()->back()->with('success', 'Rental has been canceled successfully.');
        }

        return redirect()->back()->withErrors('Cannot cancel, rental has already started.');
    }

}

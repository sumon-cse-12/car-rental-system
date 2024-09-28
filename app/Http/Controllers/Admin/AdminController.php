<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    public function index(){
        $data['total_customer'] = User::where('role','customer')->count();
        $data['total_available_car'] = Car::where('availability',1)?->count();
        $data['total_rentals'] = Rental::count();
        $data['total_earnings'] =  Rental::where('status','completed')->sum('total_cost');
        return view('admin.dashboard',$data);
    }
}

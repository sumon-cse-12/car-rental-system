<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function index()
    {
        return view('admin.rental.index');
    }

    public function show()
    {

    }

    public function get_all_rentals(Request $request)
    {
        $rentals = Rental::with('car')->get();
        return datatables()->of($rentals)

            ->addColumn('rental_id', function ($q) {
                return $q->id;
            })
            ->addColumn('customer_name', function ($q) {
                $customer_name = '<div> <strong> Name: </strong> ' . $q->user->name . ' </div>';
                return $customer_name;

            })
            ->addColumn('car_details', function ($q) {
                $name = '<div> <strong> Name: </strong> ' . $q->car->name . ' </div>';
                $brand = '<div> <strong> Brand: </strong> ' . $q->car->brand . ' </div>';
                return $name. $brand;
            })

            ->addColumn('total_cost', function ($q) {
                return $q->car->daily_rent_price;
            })
            ->addColumn('start_date', function ($q) {
                return $q->start_date;
            })
            ->addColumn('end_date', function ($q) {
                return $q->end_date;
            })

            ->addColumn('status', function ($q) {

                return $q->status;
            })
            ->addColumn('action', function ($q) {
                return "<a class='btn btn-sm btn-info' href='" . route('admin.rental.edit', [$q->id]) . "'>Edit</a>  &nbsp; &nbsp;" .
                '<button class="btn btn-sm btn-danger confirm-modal-button" data-message="Are you sure you want to delete this rental?"
                                    data-action=' . route('admin.rental.destroy', [$q]) . '
                                    data-input={"_method":"delete","id":"' . $q->id . '"}
                                    data-bs-toggle="modal" data-bs-target="#modal-confirm">Delete</button>';
            })

            ->rawColumns(['customer_name', 'car_details', 'action'])
            ->toJson();
    }
    public function create()
    {
        $data['cars'] = Car::where('availability', 1)->get();
        $data['customers'] = User::where('role', 'customer')->get();
        return view('admin.rental.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required',
            'end_date' => 'required',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        $already_rent = Rental::where('car_id', $request->car_id)
            ->where('start_date', '<=', $request->end_date)
            ->where('end_date', '>=', $request->start_date)
            ->first();
        if ($already_rent) {
            return redirect()->back()->with('error', 'Already rent');
        }

        $car = Car::where('id', $request->car_id)->firstOrFail();
        $rental = new Rental();
        $rental->user_id = $request->user_id;
        $rental->car_id = $request->car_id;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        $rental->total_cost = $car->daily_rent_price;
        $rental->save();

        return redirect()->route('admin.rental.index')->with('success', 'Rental created successfully');
    }

    public function edit(Rental $rental)
    {
        $data['customers'] = User::where('role', 'customer')->get();
        $data['cars'] = Car::where('availability', 1)->get();
        $data['rental'] = $rental;
        return view('admin.rental.edit', $data);
    }

    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required',
            'end_date' => 'required',
            'total_cost' => 'required|numeric',
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        $already_rent = Rental::where('car_id', $request->car_id)
            ->where('start_date', '<=', $request->end_date)
            ->where('end_date', '>=', $request->start_date)
            ->first();
        if ($already_rent) {
            return redirect()->back()->with('error', 'Already rent');
        }

        $car = Car::where('id', $request->car_id)->firstOrFail();

        $rental->user_id = $request->user_id;
        $rental->car_id = $request->car_id;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        $rental->total_cost = $car->daily_rent_price;
        $rental->save();

        return redirect()->route('admin.rental.index')->with('success', 'Rental updated successfully');

    }

    public function destroy(Request $request){
        $rental = Rental::findOrfail($request->id);
        $rental->delete();
        return redirect()->back()->with('success', 'Rental deleted successfully!');
    }
}

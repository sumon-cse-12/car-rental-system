<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index(){
        return view('admin.car.index');
    }

    public function get_all_cars(){
        $cars = Car::select(['id', 'name', 'brand', 'model', 'year', 'car_type', 'daily_rent_price', 'availability', 'created_at'])->orderByDesc('created_at');
        return datatables()->of($cars)
            ->addColumn('availability', function($q) {
                return $q->availability ? 'Available' : 'Unavailable';
            })
            ->addColumn('created_at', function ($q) {
                return $q->created_at->format('d-m-Y');
            })

            ->addColumn('action', function (Car $q) {
                return "<a class='btn btn-sm btn-info' href='" . route('admin.car.edit', [$q->id]) . "'>Edit</a>  &nbsp; &nbsp;" .
                    '<button class="btn btn-sm btn-danger confirm-modal-button" data-message="Are you sure you want to delete this car?"
                                        data-action=' . route('admin.car.destroy', [$q]) . '
                                        data-input={"_method":"delete","id":"'.$q->id.'"}
                                        data-bs-toggle="modal" data-bs-target="#modal-confirm">Delete</button>';
            })
            ->rawColumns(['status','action'])
            ->toJson();
    }

    public function create(){
        return view('admin.car.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'car_image' => 'required|image|max:2048',
        ]);

        $car = new Car();

        $imageName = '';
        if ($request->hasFile('car_image')) {
            $file = $request->file('car_image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageName);
            $car->image = $imageName;
        }

        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->car_type = $request->input('car_type');
        $car->daily_rent_price = $request->input('daily_rent_price');
        $car->availability = $request->input('availability');
        $car->save();

        return redirect()->back()->with('message', 'Car added successfully!');
    }

    public function edit(Car $car){
        $data['car'] = $car;
        return view('admin.car.edit', $data);
    }

    public function update(Request $request, Car $car){
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = '';
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageName);
            $blog->image = $imageName;
        }

        $car->fill($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('cars');
            $car->image = $path;
        }

        $car->save();
        return redirect()->back()->with('message', 'Car updated successfully!');
    }

    public function destroy(Request $request){
        $car = Car::findOrFail($request->id);
        $car->delete();
        return redirect()->back()->with('message', 'Car deleted successfully!');
    }
}

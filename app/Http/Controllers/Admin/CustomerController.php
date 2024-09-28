<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        return view('admin.customer.index');
    }
    public function show(){}
    public function get_all_customers(){
        $users = User::where('role','!=','admin')->select(['id', 'name', 'email', 'created_at']);
        return datatables()->of($users)


            ->addColumn('created_at', function ($q) {
               return $q->created_at->format('d-m-Y');
            })
            ->addColumn('action', function (User $q) {
                return "<a class='btn btn-sm btn-info' href='" . route('admin.customer.edit', [$q->id]) . "'>Edit</a>  &nbsp; &nbsp;" .
                    '<button class="btn btn-sm btn-danger confirm-modal-button" data-message="Are you sure you want to delete this customer?"
                                        data-action=' . route('admin.customer.destroy', [$q]) . '
                                        data-input={"_method":"delete","id":"'.$q->id.'"}
                                        data-bs-toggle="modal" data-bs-target="#modal-confirm">Delete</button>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    public function create(){
        return view('admin.customer.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $customer = new User();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $customer->role = 'customer';
        $customer->save();

        return redirect()->back()->with('success', 'Customer saved successfully!');

    }



    public function edit(User $customer){

        $data['customer'] = $customer;
        return view('admin.customer.edit',$data);

    }

    public function update(User $customer, Request $request){


        if (!$request->password) unset($request['password']);
        $customer->update($request->all());
        return redirect()->back()->with('success', 'Customer updated successfully!');
    }
    public function destroy(Request $request){
        $customer = User::where('role','customer')->findOrfail($request->id);
        $customer->delete();
        return redirect()->back()->with('success', 'Customer deleted successfully!');
    }
}

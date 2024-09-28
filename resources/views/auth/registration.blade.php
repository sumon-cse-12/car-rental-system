@extends('auth.login_layout')

@section('title')
    Customer Registration
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <div class="card-body">
                        <h4>Registration Form</h4>
                        <br />
                        <form action="{{ route('user.registration.store') }}" method="post">
                            @csrf
                            <input name="name" placeholder="User name" class="form-control" type="text" /> <br>
                            <input name="email" placeholder="User Email" class="form-control" type="email" />
                            <br />
                            <input name="password" placeholder="User Password" class="form-control" type="password" />
                            <br />
                            <button type="submit" class="btn w-100 bg-gradient-primary">Register</button>
                        </form>
                        <hr />
                        <div class="float-end mt-3">
                            <span>
                                <a class="text-center ms-3 h6" href="{{route('user.login')}}">Already Registered</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

@extends('auth.login_layout')

@section('title')
    Customer Login
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90 p-4">
                    <div class="card-body">
                        <h4>SIGN IN</h4>
                        <br />
                        <form action="{{ route('user.authentication') }}" method="post">
                            @csrf
                            <input name="email" placeholder="User Email" class="form-control" type="email" />
                            <br />
                            <input name="password" placeholder="User Password" class="form-control" type="password" />
                            <br />
                            <button type="submit" class="btn w-100 bg-gradient-primary">Login</button>
                        </form>
                        <hr />
                        <div class="float-end mt-3">
                            <span>
                                <a class="text-center ms-3 h6" href="{{route('user.registration')}}">Not Registered</a>
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

@extends('layout.admin')

@section('title')
Create Customer
@endsection
@section('css')
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 mt-5">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Create</h4>
                </div>
            </div>
            <hr class="bg-dark "/>
           <form action="{{route('admin.customer.store')}}" method="post">
            @csrf
            @include('admin.customer.form')
            <button type="submit" class="btn bg-gradient-success mt-3">Submit</button>
           </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
@endsection

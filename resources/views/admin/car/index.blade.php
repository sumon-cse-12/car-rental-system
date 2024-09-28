@extends('layout.admin')

@section('title')
All cars
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 mt-5">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>cars</h4>
                </div>
                <div class="align-items-center col">
                    <a href="{{route('admin.car.create')}}" class="float-end btn m-0  bg-gradient-primary">Create</a>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="carList">
                <thead>
                <tr class="bg-light">
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Car Type</th>
                    <th>Availability</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    "use strict";
    $('#carList').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        ajax:'{{route('admin.car.all.cars')}}',
        columns: [
            { "data": "name" },
            { "data": "brand" },
            { "data": "model" },
            { "data": "car_type" },
            { "data": "availability" },
            { "data": "created_at" },
            { "data": "action" },
        ]
    });
</script>
@endsection

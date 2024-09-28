@extends('layout.admin')

@section('title')
Rentals
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
                    <h4>Rentals</h4>
                </div>
                <div class="align-items-center col">
                    <a href="{{route('admin.rental.create')}}" class="float-end btn mb-2  bg-gradient-primary">Create</a>
                </div>
            </div>
            <table class="table" id="rentalList">
                <thead>

                    <th>Rendal Id</th>
                    <th>Customer Name</th>
                    <th>Car Details</th>
                    <th>Total cost</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    "use strict";
    $('#rentalList').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        ajax:'{{route('admin.all.rentals.info')}}',
        columns: [
            { "data": "rental_id" },
            { "data": "customer_name" },
            { "data": "car_details" },
            { "data": "total_cost" },
            { "data": "start_date" },
            { "data": "end_date" },
            { "data": "status" },
            { "data": "action" },
        ]
    });
</script>
@endsection

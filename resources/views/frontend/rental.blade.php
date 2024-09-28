@extends('frontend.layout')
@section('title') Rental
@endsection
@section('css')
<style>
    .user-info .card {
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.user-info .card:hover {
    transform: translateY(-5px);
}

.user-info .card-footer .btn {
    margin: 0 5px;
}
.pagination {
    display: flex;
    justify-content: center;
    padding: 1rem 0;
}

.page-item .page-link {
    color: #007bff;
    border: 1px solid #ddd;
    padding: 0.5rem 0.75rem;
    margin: 0 5px;
    border-radius: 5px;
}

.page-item.active .page-link {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

.page-item.disabled .page-link {
    background-color: #e9ecef;
    color: #6c757d;
}

.page-link:hover {
    background-color: #0056b3;
    color: white;
}
.rental-sec-title{
    font-size: 30px;
    color: #fff;
}

</style>
@endsection
@section('main-section')

<main class="container my-5">

    <div class="row">
        <div class="container mt-5">
            <div class="row">

                <div class="col-md-3">
                    <div class="user-info">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white text-center">
                                <div class="mb-0 rental-sec-title">User Details</div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">{{ $auth_user->name }}</h6>
                                    <p class="text-muted text-center mb-2">{{ $auth_user->email }}</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Role:</strong> {{ ucfirst($auth_user->role) }}</li>
                                        <li class="list-group-item"><strong>Joined:</strong> {{ $auth_user->created_at->format('F d, Y') }}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-outline-primary btn-sm d-none">Edit Profile</a>
                                <a href="{{route('user.logout')}}" class="btn btn-outline-danger btn-sm">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="rental-history">
                        <div class="card shadow-sm">
                            <div class="card-header bg-secondary text-white">
                                <div class="mb-0 rental-sec-title">Rental History</div>
                            </div>
                            <div class="card-body">
                                <hr class="bg-dark "/>
                                <table class="table" id="rentalHistory">
                                    <thead>
                                    <tr class="bg-light">
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Car Type</th>
                                        <th>Start Data</th>
                                        <th>End Data</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($rentals_history) && $rentals_history->isNotEmpty())
                                            @foreach ($rentals_history as $item)
                                                <tr>
                                                    <td>{{ $item->car->name }}</td>
                                                    <td>{{ $item->car->brand }}</td>
                                                    <td>{{ $item->car->model }}</td>
                                                    <td>{{ $item->car->car_type }}</td>
                                                    <td>{{ $item->start_date }}</td>
                                                    <td>{{ $item->end_date }}</td>
                                                    <td>{{ $item->total_cost }}</td>
                                                    <td>
                                                        <div>
                                                            @if($item->status == 'canceled')
                                                                <button type="button" class="btn btn-warning btn-sm" disabled>{{ ucfirst($item->status) }}</button>
                                                            @elseif(now()->isBefore($item->start_date))
                                                                <a href="{{ route('rental.cancel', $item->id) }}" class="btn btn-danger">Cancel</a>
                                                            @else
                                                                <button type="button" class="btn btn-info btn-sm" disabled>{{ ucfirst($item->status) }}</button>
                                                            @endif
                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center">No rental history found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $rentals_history->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</main>

  @endsection
  @section('js')
  @endsection

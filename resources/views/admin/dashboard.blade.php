@extends('layout.admin')
@section('title')
@endsection
@section('css')
    <style>
        section.dashboard-sec {
            margin-top: 110px;
        }
        .card-info {
    display: flex;
    justify-content: space-between;
}
    </style>
@endsection

@section('content')
    <section class="dashboard-sec">
        <div class="container mt-3">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-info">
                                <div class="info-text">
                                    <p class="text-sm mb-0 text-capitalize">Total Users</p>
                                    <h4 class="mb-0">{{isset($total_customer)?$total_customer:'0'}}</h4>
                                </div>

                                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl">
                                        <i class="fa fa-users"></i>
                                    </div>

                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-info">
                                <div class="info-text">
                                    <p class="text-sm mb-0 text-capitalize">Total Available cars</p>
                                    <h4 class="mb-0">{{isset($total_available_car)?$total_available_car:'0'}}</h4>
                                </div>

                                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl">
                                        <i class="fa fa-car"></i>
                                    </div>

                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-info">
                                <div class="info-text">
                                    <p class="text-sm mb-0 text-capitalize">Total number of rentals

                                    </p>
                                    <h4 class="mb-0">{{isset($total_rentals)?$total_rentals:'0'}}</h4>
                                </div>

                                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl">
                                        <i class="fa fa-users"></i>
                                    </div>

                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-info">
                                <div class="info-text">
                                    <p class="text-sm mb-0 text-capitalize">Total earnings</p>
                                    <h4 class="mb-0">{{isset($total_earnings)?$total_earnings:'0'}}</h4>
                                </div>

                                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>

                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

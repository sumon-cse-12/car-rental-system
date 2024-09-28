@extends('frontend.layout')
@section('title')
@endsection
@section('css')
<style>
  .banner-sec-bg-img {
        background-image: url('{{ asset('images/banner-sec-img.png') }}');
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }
    .banner-title {
    font-size: 40px;
    font-weight: 800;
}
.car-img {
    width: 100%;
    height: auto;
}
.car-img {
    width: 100%;
    height: 300px;
}
</style>
@endsection
@section('main-section')
<main class="container my-5">
<div class="banner-sec-bg-img">
    <section class="banner-section text-white text-center d-flex align-items-center" style="background-image: url('{{ asset('images/banner.jpg') }}'); background-size: cover; background-position: center; height: 70vh;">
        <div class="container">
            <div class="banner-title">Find Your Perfect Rental Car</div>
            <p class="lead">Affordable and reliable car rentals at your fingertips.</p>
            <a href="#" class="btn btn-primary btn-lg mt-3">Browse Cars</a>
        </div>
    </section>
</div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">
          <h4>Search for Available Cars</h4>
        </div>
        <div class="card-body">
          <form action="{{route('front.index')}}" method="get">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="car_type" class="form-label">Car Type</label>
                <select class="form-select" id="car_type" name="car_type">
                    @if(isset($car_types) && $car_types)
                    <option>Select Car Type</option>
                        @foreach($car_types as $car_type)
                        <option value="{{$car_type}}">{{ucfirst($car_type)}}</option>
                        @endforeach
                    @endif
                </select>
              </div>
              <div class="col-md-6">
                <label for="car_brand" class="form-label">Car Brand</label>
                <select class="form-select" id="brand" name="brand">
                    @if(isset($brands) && $brands)
                    <option>Select Car Brand</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand}}">{{ucfirst($brand)}}</option>
                        @endforeach
                    @endif
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <label for="min_rent_price" class="form-label">Price Range (Daily Rent)</label>
                <div class="d-flex">
                    <input type="number" name="min_rent_price" id="min_rent_price" class="form-control me-2" placeholder="Min price">
                    <input type="number" name="max_rent_price" id="max_rent_price" class="form-control" placeholder="Max price">
                </div>
              </div>

            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Search Cars</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


    <div class="row mt-5">
      @if(isset($cars) && $cars)
        @foreach ($cars as $car)
        <div class="col-md-4">
            <div class="card mt-3">
                @if(isset($car->image) && $car->image)
                <img src="{{asset('uploads/'.$car->image)}}" class="car-img img-fluid" alt="Card Image">
                @endif

              <div class="card-body">
                <h5 class="card-title">{{isset($car->name)?$car->name:''}}</h5>
                <p class="card-text">Daily Rent Price <strong>{{isset($car->daily_rent_price)?$car->daily_rent_price:''}}</strong></p>
               <div>
                <strong>{{ isset($car) && isset($car->availability) ? ($car->availability ? 'Available' : 'Unavailable') : 'Unavailable' }}</strong>
               </div>
                <a href="{{route('front.car.details',[$car->id])}}" class="btn btn-primary">View Car</a>
              </div>
            </div>
          </div>
        @endforeach
      @endif

    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Customer Reviews</h2>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-sm-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Car: Toyota Camry</h6>
                        <p class="card-text">"Amazing experience! The car was in great condition and the service was top-notch. I highly recommend this rental service."</p>
                        <span class="badge bg-success">5/5</span>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-sm-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Jane Smith</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Car: BMW X5</h6>
                        <p class="card-text">"Had a wonderful time driving the BMW X5. The rental process was smooth, and customer service was extremely helpful."</p>
                        <span class="badge bg-success">4.5/5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  @endsection
  @section('js')
  @endsection

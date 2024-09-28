@extends('frontend.layout')
@section('title') Car Details
@endsection
@section('css')
@endsection
@section('main-section')
<main class="container my-5">
    <div class="row">

      <div class="col-md-6">
        <div class="car-img-sec">
            @if(isset($car->image) && $car->image)
            <img src="{{asset('uploads/'.$car->image)}}" class="img-fluid" alt="">
            @endif
        </div>
      </div>
      <div class="col-md-6">
        <h3>{{isset($car->name)?$car->name:''}}</h3>
        <strong>Daily rent price :  <span class="rent-price">{{isset($car->daily_rent_price)?$car->daily_rent_price:''}}</span></strong> <br>

        <strong>Brand:</strong> <span>{{isset($car->brand)?$car->brand:''}}</span> <br>
        <strong>Model:</strong> <span>{{isset($car->model)?$car->model:''}}</span>
        <p><strong>Availability:</strong> {{$car->availability ? 'Available' : 'Unavailable'}}</p>
        <button class="btn btn-info book-car-btn" data-bs-toggle="modal" data-bs-target="#booking-car-modal">Book Car</button>
      </div>
    </div>





  </div>
  </main>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="booking-car-modal" tabindex="-1" aria-labelledby="booking-car-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="booking-car-modalLabel">Choose Time</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <form action="{{route('booking.car')}}" method="post">
        @csrf
        <input type="hidden" name="car_id" value="{{isset($car->id)?$car->id:''}}">
        <div class="modal-body">
            <div class="form-group">
                <label for="">Rental Start Date</label>
                <input type="date" class="form-control" name="start_date">
            </div>
            <div class="form-group">
                <label for="">Rental End Date</label>
                <input type="date" class="form-control" name="end_date">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
          </div>
      </form>
      </div>
    </div>
  </div>
  @endsection
  @section('js')
  @endsection

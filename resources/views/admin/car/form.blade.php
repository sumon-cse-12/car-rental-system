<div class="row">
    <div class="col-md-6">
      <label class="form-label mt-2" for="name">Car Name</label>
      <input type="text" value="{{isset($car->name)?$car->name:''}}" name="name" class="form-control" id="name">
    </div>
    <div class="col-md-6">
      <label class="form-label mt-2" for="brand">Brand</label>
      <input type="text" value="{{isset($car->brand)?$car->brand:''}}" name="brand" class="form-control" id="brand">
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <label class="form-label mt-2" for="model">Model</label>
      <input type="text" value="{{isset($car->model)?$car->model:''}}" name="model" class="form-control" id="model">
    </div>
    <div class="col-md-6">
      <label class="form-label mt-2" for="year">Year</label>
      <input type="number" value="{{isset($car->year)?$car->year:''}}" name="year" class="form-control" id="year">
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <label class="form-label mt-2" for="car_type">Car Type</label>
      <input type="text" value="{{isset($car->car_type)?$car->car_type:''}}" name="car_type" class="form-control" id="car_type">
    </div>
    <div class="col-md-6">
      <label class="form-label mt-2" for="daily_rent_price">Daily Rent Price</label>
      <input type="number" step="0.01" value="{{isset($car->daily_rent_price)?$car->daily_rent_price:''}}" name="daily_rent_price" class="form-control" id="daily_rent_price">
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <label class="form-label mt-2" for="availability">Availability</label>
      <select name="availability" class="form-control" id="availability">
        <option value="1" {{ isset($car->availability) && $car->availability == 1 ? 'selected' : '' }}>Available</option>
        <option value="0" {{ isset($car->availability) && $car->availability == 0 ? 'selected' : '' }}>Unavailable</option>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label mt-2" for="image">Car Image</label>
      <input type="file" name="car_image" class="form-control" id="image">
    </div>
  </div>

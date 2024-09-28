<div class="mb-3">
    <label class="form-label mt-2">Customer Name</label>
    <select name="user_id" class="form-control">
        <option value="">Select a Customer</option>
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ isset($rental->user_id) && $rental->user_id == $customer->id ? 'selected' : '' }}>
                {{ $customer->name }}
            </option>
        @endforeach
    </select>
</div>


<div class="mb-3">
    <label class="form-label mt-2">Car</label>
    <select name="car_id" class="form-control" required>
        <option value="">Select Car</option>
        @foreach($cars as $car)
            <option value="{{ $car->id }}" {{ isset($rental->car_id) && $rental->car_id == $car->id ? 'selected' : '' }}>
                {{ $car->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label mt-2">Start Date</label>
    <input type="date" value="{{ isset($rental->start_date) ? $rental->start_date : '' }}" name="start_date" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label mt-2">End Date</label>
    <input type="date" value="{{ isset($rental->end_date) ? $rental->end_date : '' }}" name="end_date" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label mt-2">Total Cost</label>
    <input type="text" value="{{ isset($rental->total_cost) ? $rental->total_cost : '' }}" name="total_cost" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label mt-2">Status</label>
    <select name="status" class="form-control" required>
        <option value="ongoing" {{ isset($rental->status) && $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
        <option value="completed" {{ isset($rental->status) && $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="canceled" {{ isset($rental->status) && $rental->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
    </select>
</div>

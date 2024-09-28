<label class="form-label mt-2">Name</label>
<input type="text" value="{{isset($customer->name)?$customer->name:''}}" name="name" class="form-control">
<label class="form-label mt-2">Email</label>
<input type="email" value="{{isset($customer->email)?$customer->email:''}}" name="email" class="form-control">
<label class="form-label mt-2">Password</label>
<input type="password" name="password" class="form-control">

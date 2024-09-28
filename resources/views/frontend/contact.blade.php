@extends('frontend.layout')
@section('title') Contact Us
@endsection
@section('css')
@endsection
@section('main-section')
<main class="container my-5">
    <div class="row">
            <div class="col-md-12">
                <div class="contact-us-title">
                    Contact Us
                </div>
                <div class="contact-us-des">
                   Contact with us for more information
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-8 m-auto">
           <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" placeholder="Enter Your Email">
            </div>
            <div class="form-group">
                <label for="">Subject</label>
                <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="" class="form-control" id="" cols="5" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
           </form>
        </div>
    </div>
  </main>
  @endsection
  @section('js')
  @endsection

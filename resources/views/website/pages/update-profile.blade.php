@extends('website.layouts.app')

@section('title') My Profile @endsection

@section('content')
<div class="container my-5">
    <form action="">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pb-5">Update Profile</h2>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="Abdul Khaliq">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="abdul@gmail.com">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="+966 56 040 1986">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="Shiekh Zayed Road">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="*****">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="*****">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ url('profile')}}" class="btn btn-outline-dark">Cancel</a>
                <button class="btn bg-black-gradient">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection

@extends('website.layouts.app')

@section('title') My Profile @endsection

@section('content')
<div class="container my-5">
    <h2 class="text-center pb-5">Profile</h2>
    <span class="d-flex justify-content-center">
        <a href="{{ url('update-profile')}}" class="btn bg-black-gradient mb-3">Edit Profile </a>
      </span>
    <ul class="list-group">
        <li class="list-group-item"><strong>Name: </strong><span class="ps-3">Abdul Khaliq</span></li>
        <li class="list-group-item"><strong>Email: </strong><span class="ps-3">abdul@gmail.com</span></li>
        <li class="list-group-item"><strong>Mobile: </strong><span class="ps-3">+966 56 040 1986</span></li>
        <li class="list-group-item"><strong>Address: </strong><span class="ps-3">Shiekh Zayed Road</span></li>
      </ul>
</div>
@endsection

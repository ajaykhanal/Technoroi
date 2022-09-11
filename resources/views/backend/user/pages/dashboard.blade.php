@extends('frontend.layouts.base')
@section('title', ' User Dashboard')
@section('mainarea')
   <div class="container my-5">
    <h3>User Details</h3><hr>
     <h5>Email: {{Auth::user()->email}}</h5>
     <a href="/logout" class="btn btn-info">Logout</a>
   </div>
@endsection

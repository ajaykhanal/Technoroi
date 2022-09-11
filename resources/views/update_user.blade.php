@extends('backend.layouts.base')
@section('title','Update User')
@section('content')
<div class="container jumbotron my-3">
    <h3>Update Role</h3><hr>
    <div class="container my-5">

    <p>Role: </p>
    <form method="POST" action="{{route('role_updated',$user->id)}}">
        @csrf()
    <select class="form-control" name="role_as">
        @if($user->role_as==1)
        <option>Admin</option>
        <option>Normal User</option>
        @else
        <option>Normal User</option>
        <option>Admin</option>
        @endif
    </select><br><br>
    <input type="submit" class="btn btn-success" value="Update">
    </form>
  </div>
@endsection

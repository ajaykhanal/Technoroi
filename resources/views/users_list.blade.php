@extends('backend.layouts.base')
@section('title','Users List')
@section('content')
<div class="container jumbotron my-3">
    <h3>Users List</h3><hr>
    <div class="container my-5">

    <table class="table table-bordered table-striped my-3">
        <thead>
           <tr>
               <th>Sno</th>
               <th>Email</th>
               <th>Role</th>

               <th>Actions</th>

           </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->email}}</td>

                <td>
                    @if($user->role_as==1)
                    <span class="badge bg-warning">Admin</span>
                    @else
                    <span class="badge bg-success">Normal User</span>
                    @endif
                </td>
                <td><a href="{{route('update_user',$user->id)}}" class="btn btn-success">Update</a>

                </td>

            </tr>
            @endforeach

        <tbody>

   </table>
  </div>
@endsection

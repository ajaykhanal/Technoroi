@extends('backend.layouts.base')
@section('title','Search List')
@section('content')
<div class="container jumbotron my-3">
    <h3>Search List</h3><hr>
    <div class="container my-5">

    <table class="table table-bordered table-striped my-3">
        <thead>
           <tr>
               <th>Title</th>
               <th>Poster</th>
               <th>Date Release</th>
               <th>Status</th>
               <th>Actions</th>

           </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{$movie->title}}</td>
                <td><img src="{{asset('posters/'.$movie->poster)}}" height="70px" weight="70px"></td>
                <td>{{$movie->date}}</td>
                <td>
                    @if($movie->status==0)
                    <span class="badge bg-warning">Unpublish</span>
                    @else
                    <span class="badge bg-success">Publish</span>
                    @endif
                </td>
                <td><a href="{{route('edit',$movie->id)}}" class="btn btn-success">Edit</a>
                     <a href="{{route('delete_movie',$movie->id)}}" class="btn btn-danger">Delete</a>
                </td>

            </tr>
            @endforeach

        <tbody>

   </table>
  </div>
@endsection

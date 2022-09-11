@extends('backend.layouts.base')
@section('title','Edit  Movie')
@section('content')
<div class="container jumbotron my-3">
    <h3>Edit Movie</h3><hr>
    <form method="POST" action="{{route('update_movie',$movie->id)}}" enctype="multipart/form-data">
        @csrf()
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{$movie->title}}">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="5" cols="5">{{$movie->description}}</textarea>
        <label>Release Date</label>
        <input type="text" class="form-control" name="datefilter" value="{{$movie->date}}"><br>
        <label>Poster</label>
        <input type="file" name="poster"><br>
        <img src="{{asset('posters/'.$movie->poster)}}" height="100px" width="100px">
        <br><br>
        <label>Status</label>
        <input type="checkbox"  name="status" value="1"{{$movie->status==1?'checked':'unchecked'}} style="width:20px; height:20px;"><br>
        <input type="submit" class="btn btn-success" value="Update Movie">
    </form>
  </div>
@endsection

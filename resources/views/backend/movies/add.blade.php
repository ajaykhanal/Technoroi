@extends('backend.layouts.base')
@section('title','Add Movie')
@section('content')
<div class="container jumbotron my-3">
    <h3>Add Movie</h3><hr>
    <form method="POST" action="{{route('movie_data')}}" enctype="multipart/form-data">
        @csrf()
        <label>Title</label>
        <input type="text" class="form-control" name="title">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="5" cols="5"></textarea>
        <label>Release Date</label>
        <input type="text" class="form-control" name="datefilter"><br>
        <label>Likes</label>
        <input type="number" class="form-control" name="like"><br>
        <label>Poster</label>
        <input type="file" name="poster"><br><br>
        <label>Status</label>
        <input type="checkbox"  name="status" value="1" style="width:20px; height:20px;"><br>
        <input type="submit" class="btn btn-success" value="Add Movie">
    </form>
  </div>
@endsection

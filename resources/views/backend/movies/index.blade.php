@extends('backend.layouts.base')
@section('title','Movies List')
@section('content')
<div class="container jumbotron my-3">
    <h3>Movies List</h3><hr>
    <div class="container my-5">
        {{-- <div class="row" style="float:right;">
            <h5>Search by Date Range:</h5><hr>
          <div class="col">
             <b>From:</b><input type="date" class="form-control" placeholder="From Date" name="from_date">
          </div>
          <div class="col">
            <b>To:</b><input type="date" class="form-control" name="to_date">
            <input type="search" class="btn  btn-sm btn-success" value="Search">
          </div><br>
       </div> --}}
       <div class="container">
        <div class="row my-4" style="float:right;">
            <div class="col-md-12">
                    <form method="POST" action="{{route('search_data')}}">
                        @csrf()
                        <div class="col">
                            <input type="date" class="form-control" placeholder="Search by Date Range" name="start_date">
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" placeholder="Search by Date Range" name="end_date">
                        </div>
                        <div class="col col-md-5">
                            <input type="submit" class="btn btn-success" name="search" value="Search">
                        </div>
                    </form>
            </div>
        </div>
      </div>
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
            @forelse($movies as $movie)
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
            @empty
              <tr>
                  <td> No Results Found</td>
                </tr>
            @endforelse



        <tbody>

   </table>
  </div>
@endsection

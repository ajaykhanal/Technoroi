@extends('frontend.layouts.base')
@section('title',' All Favourite')
@section('mainarea')
  <div class="container my-2 col-md-6">
      <h3>All Favourite</h3><hr>
       <table class="table table-hovered table-striped">
          <thead>
            <tr>
                <th>Sno</th>
                <th>User</th>
                <th>Movie Name</th>
                <th>Poster</th>
            </tr>
          </thead>
          <tbody>
             @foreach($all_favourites as $fav)
               <tr>
                   <td>{{$loop->iteration}}</td>
                   <td>{{$fav->user->name}}</td>
                   <td>{{$fav->movie->title}}</td>
                   <td><img src="{{asset('posters/'.$fav->movie->poster)}}" height="100px" width="100px"></td>
               </tr>
               @endforeach
          </tbody>
       </table>
  </div>
@endsection

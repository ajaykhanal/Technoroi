@extends('frontend.layouts.base')
@section('title','Favourite Movies')
@section('mainarea')
  <div class="container my-2 col-md-6">
      <h3>My Favourite Movies</h3><hr>
       <table class="table table-hovered table-striped">
          <thead>
            <tr>
                <th>Sno</th>
                <th>Movie Name</th>
                <th>Poster</th>
            </tr>
          </thead>
          <tbody>
             @foreach($my_favourites as $fav)
               <tr>
                   <td>{{$loop->iteration}}</td>
                   <td>{{$fav->movie->title}}</td>
                   <td><img src="{{asset('posters/'.$fav->movie->poster)}}" height="100px" width="100px"></td>
               </tr>
               @endforeach
          </tbody>
       </table>
  </div>
@endsection

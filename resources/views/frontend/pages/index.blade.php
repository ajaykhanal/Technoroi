@extends('frontend.layouts.base')
@section('title', 'Home')
@section('mainarea')

    {{-- <livewire:product-list-livewire /> --}}
    <div class="container my-4 ">
        <div class="row">
            <div class="col-md-8">
            <div class="card-column">
                @foreach ($movies as $movie)
                    <div class="card" style="width:18rem; float:left;">
                        <img class="card-img-top" src="{{ asset('posters/' . $movie->poster) }}"
                         style="height:200px;  width:200px;">
                        <div class="card-body">
                            <a href="" ><h5 class="card-title">{{ $movie->title }}</h5></a>
                            <p class="card-text">{{ $movie->description }}</p>
                            <a href="" id="facebook-btn" onclick="facebook()" style="text-decoration:none;">
                                <p style="color:#e53637; font-size:20px;">&nbsp;<i class="fa fa-thumbs-up" style="font-size:19px; color:blue;">({{$movie->like}})</i></p>
                            </a><br><br>
                            @auth
                            <input type="hidden" name="movie_id" value="{{$movie->id}}">
                            <a href="{{route('add_to_favourite',$movie->id)}}" class="btn btn-success">Add to Favourite</a>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
            </div>

       </div>
    </div>

@endsection


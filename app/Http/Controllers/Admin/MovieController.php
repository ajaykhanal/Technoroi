<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MovieController extends Controller
{
    public function add_movie(){
        return view('backend.movies.add');
    }

    public function movie_data(Request $request){
        $data= new Movie();
        $data->title= $request->title;
        $data->description= $request->description;
        $data->date= $request->datefilter;
        $data->like= $request->like;
        $data->favourite_id= 0;


        if($request->hasFile('poster')){
            $image= $request->file('poster');
            $reImage= Str::slug($request->title).'-'.time().'.'.$image->getClientOriginalExtension();
            $dest1= public_path('/posters');
            $image->move($dest1,$reImage);
            $data->poster=$reImage;

        }else{
            $data->poster="Empty";
        }

        $data->status= $request->status?true:false;
        $data->save();
        return redirect('/movies')->with('success',"Movie Created Successfully!!");
    }


    // public function index(Request $request){
    //     if ($request->input('start_date') && $request->input('end_date')) {
    //         $start_date = Carbon::parse($request->input('start_date'));
    //         $end_date = Carbon::parse($request->input('end_date'));
    //         if ($end_date->greaterThan($start_date)) {
    //             $movies = Movie::whereBetween('created_at', [$start_date, $end_date])->get();
    //             return view('backend.movies.index',compact('movies'));
    //         } else {
    //             $movies = Movie::all();
    //         }
    //     }
    //     else{
    //         $movies = Movie::all();
    //     }
    //     return view('backend.movies.index',compact('movies'));
    // }


    public function index(Request $request){
         $movies= Movie::all();
        return view('backend.movies.index',compact('movies'));
    }

    public function search_data(Request $request){
        $movies= Movie::whereBetween('created_at',[ $request->start_date.'00:00:00',
                                                   $request->end_date.'50:59:59'
                                        ])->get();
        dd($movies);
        return view('backend.movies.search_data',compact('movies'));
    }

    public function edit($id){
        $movie= Movie::find($id);
        return view('backend.movies.edit',compact('movie'));
    }

    public function update_movie(Request $request, $id){
        $movie= Movie::find($id);
        $movie->title= $request->title;
        $movie->description= $request->description;
        $movie->date= $request->datefilter;
        $movie->like= $request->like;
        $movie->favourite_id= 0;
        if($request->hasFile('poster')){
            $image= $request->file('poster');
            $reImage= Str::slug($request->title).'-'.time().'.'.$image->getClientOriginalExtension();
            $dest1= public_path('/posters');
            $image->move($dest1,$reImage);
            $movie->poster=$reImage;
        }
        $movie->status= $request->status?true:false;
        $movie->update();
        return redirect('/movies')->with('success',"Movie Updated Successfully!!");
    }

    public function delete_movie($id){
        $movie= Movie::find($id)->delete();
        return redirect('/movies')->with('success',"Movie Deleted Successfully!!");
    }


}

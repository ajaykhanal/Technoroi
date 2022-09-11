<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavouriteMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use DB;

class HomeController extends Controller
{
    public function index(){
        $movies= Movie::all()->where('status',1);
        return view('frontend.pages.index',compact('movies'));
    }

    public function custom_register(){
        return view('frontend.pages.register');
    }

    public function register_data(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);
        $user= new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $res= $user->save();
        if($res){
            return redirect("/login")->with('success', 'Your form has been registered');
        }else{
            return back()->with('fail','Your form hasnot been registered');
        }
    }


    public function custom_login(){
        return view('frontend.pages.login');
    }

    public function login_data(Request $request){
        $request->validate([
                    'email'=>'required',
                    'password'=>'required',
        ]);

        $check= $request->only('email','password');

        if(Auth::guard('web')->attempt($check)){

            if(Auth::user()->role_as == 0){
                return redirect('/user-dashboard')->with('success','You have been loggedin successfully as User!!');
            }
            elseif(Auth::user()->role_as == 1){
                return redirect('/dashboard')->with('success','You have been loggedin successfully as Admin!!');
            }

        }else{
            return redirect('/login')->with('error','Invalid Credentials!!');
        }
    }


    public function add_to_favourite(Request $request,$id){
        $movie= Movie::find($id);
        $favourite= new FavouriteMovie();
        $favourite->user_id= Auth::user()->id;
        $movie_id=$movie->id;
        $favourite->movie_id= $movie_id;

        $favourite_movie_check= FavouriteMovie::where('movie_id',$movie_id)->first();
        if($favourite_movie_check){
            return back()->with('error',' Already Add to Favourites!!');
        }
        $favourite->save();
        $message= 'Thanks for adding to favourites for our movies!!';
        $mail_data= [
            'body'=> $message,
        ];
        \Mail::send('email_template',$mail_data, function($message) use($request){
            $message->from('ganeshkhanal946@gmail.com');
            $message->to(Auth::user()->email);
            $message->subject('Add to Favourite');
        });

        return back()->with('success',' We have sent an Email for Adding to Favourites, Thanks!!');
    }

    public function my_favourites(){
        $my_favourites= FavouriteMovie::where('user_id',Auth::id())->get();
        return view('frontend.pages.my_favourites',compact('my_favourites'));
    }

    public function all_favourite_movies(){
        $all_favourites= FavouriteMovie::all();
        return view('frontend.pages.all_favourite_movies',compact('all_favourites'));
    }
}

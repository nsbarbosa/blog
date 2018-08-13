<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;
use DB;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post = post::all();
        $post = DB::table('posts')->join('Users','users.id','=','posts.id_autor')->select('posts.*','Users.name')->paginate(2);

        return view('home',compact('post'));
       
        
    }

   
}

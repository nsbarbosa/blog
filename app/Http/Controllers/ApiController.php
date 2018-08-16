<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use DB;
class ApiController extends Controller
{
    //
    public function posts(Request $request){
        $post = DB::table('posts')->join('Users','users.id','=','posts.id_autor')->select('posts.*','Users.name')->paginate(2);
            
            return response()->json($post,200);

    }
}
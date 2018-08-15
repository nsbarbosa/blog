<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use View;
use App\User;
use DB;
use App\Http\Requests\postRequest;

class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = DB::table('posts')->join('Users','users.id','=','posts.id_autor')->select('posts.*','Users.name')->where('id_autor',auth()->user()->id)->paginate(2);
        return view('index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //'titulo' => 'required|max:20| not_regex:teste*',
        //$regras = array('test' => array('max:20', 'not_regex:teste*'));
        $palavra = str_is('teste',$request->titulo);
        if($palavra){
            return redirect()->route('post.index')->with('message', 'O titulo não pode conter a palavra teste!');
        }
        else{
            
            $post = new post;
            $post->titulo        = $request->titulo;
            $post->descricao = $request->descricao;
            $post->id_autor = auth()->user()->id;
            $post->slug = str_slug($request->titulo, '-');
            $criar = $post->save();
               
            return redirect()->route('post.index')->with('message', 'Post criado!');
        }
        

       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post = DB::table('posts')->join('Users','users.id','=','posts.id_autor')->select('posts.*','Users.name')->where('slug','=',$slug)->first();
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $post = post::where('slug','=',$slug)->first();
        
        return view('criar',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {   
        $palavra = str_is('teste',$request->titulo);
        if($palavra){
            return redirect()->route('post.edit',$post->slug)->with('message', 'O titulo não pode conter a palavra teste!');
        }
        else{
            $post->update($request->all());
                return  redirect()->route('post.index')->with('message','post editado!');
        }
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $post = post::where('slug','=',$slug)->first();
        $deletar = $post->delete();
        return redirect()->route('post.index')->with('message','Post deletado!');
     
    }
   
}
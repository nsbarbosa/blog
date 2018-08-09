<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = post::orderBy('created_at', 'desc')->paginate(2);
        return view('post.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
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
        $post = new post;
        $post->titulo        = $request->titulo;
        $post->descricao = $request->descricao;
        $post->id_autor = auth()->user()->id;
        $post->save();
        return redirect()->route('post.index')->with('message', 'Post criado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
        $post = post::all();
        return view('post.index',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
        $post = post::findOrFail($id);
        return view('post.edit',compact('post','id'));
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
        //
        $post = post::findOrFail($id);
        $post->titulo        = $request->titulo;
        $post->descricao = $request->descricao;
        $post->save();
        return redirect()->route('post.index')->with('message', 'Post editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
        $post = post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('alert-success','Produto deletado!');
    }
}

<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show']]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titulo' => 'required|max:20|not_regex:teste*',
            'slug' => 'unique',
            
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$post = post::orderBy('created_at', 'desc')->paginate(2);
        //return view('welcome',['posts' => $posts]);
        return view('welcome');
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
        $post = new post;
        $post->titulo        = $request->titulo;
        $post->descricao = $request->descricao;
        $post->id_autor = auth()->user()->id;
        $post->slug = $this->slug($request->titulo);
        $criar = $post->save();
        if($criar){
            return redirect()->route('post.index')->with('message', 'Post criado!');
        }
        else{
            return redirect()->route('post.index')->with('message', 'Erro ao criar post!');
        }
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
        $editar = $post->save();
        if($editar){
            return redirect()->route('post.index')->with('message', 'Post editado!');
        }
        else{
            return redirect()->route('post.index')->with('message', 'Erro ao editar post!');
        }
        
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
        $deletar = $post->delete();
        return redirect()->route('post.index')->with('alert-success','Produto deletado!');
        if($deletar){
            return redirect()->route('post.index')->with('message', 'Post excluído!');
        }
        else{
            return redirect()->route('post.index')->with('message', 'Erro ao excluir post!');
        }
    }

    function slug($titulo){
        $caracter = ['Ä','Å','Á','Â','À','Ã','ä','á','â','à','ã','É','Ê','Ë','È','é','ê','ë','è','Í','Î','Ï','Ì','í','î','ï','ì','Ö','Ó','Ô','Ò','Õ','ö','ó','ô','ò','õ','Ü','Ú','Û','ü','ú','û','ù','Ç','ç'];
        $novoCaracter = ['A','A','A','A','A','A','a','a','a','a','a','E','E','E','E','e','e','e','e','I','I','I','I','i','i','i','i','O','O','O','O','O','o','o','o','o','o','U','U','U','u','u','u','u','C','c'];
        return str_replace($caracter,$novoCaracter,mb_strtolower($titulo));
    }
}

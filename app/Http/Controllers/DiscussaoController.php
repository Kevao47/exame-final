<?php

namespace App\Http\Controllers;

use App\Models\Discussao;
use Illuminate\Http\Request;

class DiscussaoController extends Controller
{
    public function home()
    {
        // Carrego o contador de comentarios via eager loading baseado nas relações que eu defini na model
        $jogos = Discussao::withCount('comentarios')->orderBy('comentarios_count', 'desc')->paginate(20);
        return view('home')->with([
            'title' => 'Discussao',
            'headers' => ['Titulo', 'Comentarios'],
            'discussoes' => $jogos
        ]);
    }
    public function show($id)
    {
        // Carrego os comentarios via eager loading baseado nas relações que eu defini na model

        $discussao = Discussao::with('comentarios')->findOrFail($id);
        return view('discussao', ['discussao' => $discussao]);
    }

    public function comentar(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required'
        ]);
        $discussao = Discussao::findOrFail($id);
        $discussao->comentar($request->comentario); // Abstrai o processo de comentar atravez de um metodo da model
        return back();
    }

    public function create()
    {
        return view('publicar');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'texto' => 'required',
        ]);
        $discussao = Discussao::create(array_merge( // Adiciono user_id no array para o mass assignment do laravel
            ['user_id' => auth()->user()->id],
            $request->all()
        ));
        
        return redirect()->route('show-discussao', ['id' => $discussao->id]);
    }
}

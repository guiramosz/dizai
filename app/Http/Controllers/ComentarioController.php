<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Carrega todods os dados da tabela comentariose envia para a view "dizai" */
        $comentarios = Comentario::orderby('id','DESC')->get(); //Carrega os dados na variável
        //var_dump($comentarios); //Testa a variável $comentarios
        //Carrega a view com os dados da variável
        return view('dizai',['comentarios' => $comentarios]); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Instancia a tabela comentarios
        $comentario = new Comentario;
        $comentario->codinome = $request->codinome;
        $comentario->espirito = $request->espirito;
        $comentario->comentario = $request->comentario;

        $comentario->save();
        return redirect('/');
    }
}

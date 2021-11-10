<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogador = new Jogador();
        $jogadors = Jogador::All();
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadors" => $jogadors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get("id") != ""){
            $jogador = Jogador::Find($request->get("id"));
        }else{
            $jogador = new Jogador();
        }
        $jogador->nomeJogador = $request->get("nomeJogador");
        $jogador->dataNascimento = $request->get("dataNascimento");
        $jogador->clube = $request->get("clube");
        $jogador->posicao = $request->get("posicao");

        $jogador->save();

        $request->session()->Flash("status", "salvo");
        return redirect("/jogador");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = Jogador::Find($id);
        $jogadors = Jogador::All();
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadors" => $jogadors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Jogador::Destroy($id);
        $request->Session()->Flash("status", "excluido");
        return redirect("/jogador");
    }
}

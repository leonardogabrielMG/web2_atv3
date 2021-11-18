<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use Illuminate\Support\Facades\Storage;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clube = new Clube();
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
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
            $clube = Clube::Find($request->get("id"));
        }else{
            $clube = new Clube();
        }

        $clube = new Clube();

        $clube->nomeClube = $request->get("nomeClube");
        $url = $request->file("url")->store('public/teste');
        $url = str_replace("public/", "storage/", $url);
        $clube->url = $url;

        $clube->save();

        $request->session()->Flash("status", "salvo");
        return redirect("/clube");
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
        $clube = Clube::Find($id);
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
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
        $clube = Clube::Find($id);
        $url = $clube->url;
        $url = str_replace("storage/", "public/", $url);

        $clube->delete();

        Storage::delete($url);

        $request->Session()->Flash("status", "excluido");
        return redirect("/clube");
    }
}

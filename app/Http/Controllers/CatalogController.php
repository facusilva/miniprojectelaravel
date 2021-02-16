<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Log;


class CatalogController extends Controller
{   
    
    public function getIndex(){
        $arrayPeliculas=Movie::all();
        return view('catalog.index')->with(compact('arrayPeliculas'));
    }
    
    public function getShow($id){
        $pelicula=Movie::where('id', '=' ,$id)->first();
        return view('catalog.show')->with(compact('pelicula'))->with(compact('id'));
    }
    
    public function getCreate(){
        return view('catalog.create');
    }
    
    public function putEdit(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'year'=>'required',
            'director'=>'required',
            
        ]);
        //recuperar objeto movie con el id del request y asignarle los datos del request con =
        $pelicula=Movie::where('id', '=' ,$id)->first();
        $pelicula->title=$request->title;
        $pelicula->year=$request->año;
        $pelicula->director=$request->director;
        $pelicula->poster=$request->poster;
        $pelicula->synopsis=$request->synopsis;
        $pelicula->save();
        return view('catalog.show')->with(compact('pelicula'));
    }
    
    public  function postCreate(Request $request){
        $request->validate([
            'title'=>'required',
            'year'=>'required',
            'director'=>'required',
            
        ]);
        $pelicula = new Movie();
        $pelicula->title=$request->title;
        $pelicula->year=$request->year;
        $pelicula->director=$request->director;
        $pelicula->poster=$request->poster;
        $pelicula->synopsis=$request->synopsis;
        $pelicula->save();
        return view('catalog.show')->with(compact('pelicula'));
    }
    
    public function getEdit($id){
        $pelicula=Movie::where('id', '=' ,$id)->first();
        return view('catalog.edit')->with(compact('pelicula'))->with(compact('id'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ambientes;
use Illuminate\Http\Request;

class AmbientesController extends Controller
{
  public function index(){
    $ambientes = Ambientes::get();
    return view('admin.ambientes', ['ambientes'=>$ambientes]);
  }

  public function crearAmbiente(Request $request){
    $ambientes = new Ambientes;
    $ambientes->nombre_ambiente = $request->input('ambiente');
    $ambientes->save();
    return to_route('ambientes');
  }

  public function actualizarAmbiente(Request $request){
    $id = $request->input('ambiente-id');
    $ambientes = Ambientes::find($id);
    $ambientes->nombre_ambiente = $request->input('edit-ambiente');
    $ambientes->save();

    return to_route('ambientes');
  }

  public function borrarAmbiente(Ambientes $ambiente){
     $ambiente->delete();
     return to_route('ambientes');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ambientes;
use App\Models\Llaves;
use App\Models\Prestamos;
use Illuminate\Http\Request;

class LlavesController extends Controller
{
    public function index(){
        $llaves = Llaves::select('llaves.id as id_llave','llaves.id_ambiente','llaves.estado','ambientes.*')
        ->join('ambientes', 'llaves.id_ambiente', '=', 'ambientes.id')->get();

        $ambientes = Ambientes::get();
        return view('admin.llaves', ['llaves' =>$llaves], ['ambientes'=>$ambientes]);
    }

    public function crearLLave(Request $request){
        $llaves = new Llaves;
        if($request->input('id-ambiente')==0){
            session()->flash('estado', 'Escoja un ambiente');
            return to_route('llaves') ;

        }else{
            $estado_default = 'Disponible';
            $llaves->id_ambiente = $request->input('id-ambiente');
            $llaves->estado = $estado_default;
            $llaves->save();
            return to_route('llaves');
        }
    }

    public function actualizarLLave(Request $request){
        $id = $request->input('id-llave');
        $llaves = Llaves::find($id);
        if($request->input('id-ambiente')==0){
            return to_route('llaves');
        }else{
            $llaves->id_ambiente = $request->input('id-ambiente');
            $llaves->save();
            return to_route('llaves');
        }
    }

    public function borrarLlave(Llaves $llave){
        $llave->delete();
        return to_route('llaves');
    }
}

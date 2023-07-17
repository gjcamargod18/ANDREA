<?php

namespace App\Http\Controllers;

use App\Models\Llaves;
use App\Models\Prestamos;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PrestamosController extends Controller
{
    public function index(){
        $prestamos = Prestamos::select('prestamos.*', 'users.name','u.name as usuario','llaves.id_ambiente' ,'ambientes.nombre_ambiente')
        ->join('users', 'prestamos.documento_instructor', 'users.documento')
        ->rightjoin('users as u', 'prestamos.id_usuario', 'u.id')
        ->join('llaves', 'prestamos.id_llave', 'llaves.id')
        ->join('ambientes', 'llaves.id_ambiente', 'ambientes.id')->get();

        $llaves = Llaves::select('llaves.id as id_llave','llaves.id_ambiente','llaves.estado','ambientes.*')
        ->join('ambientes', 'llaves.id_ambiente', '=', 'ambientes.id')->get();

        return view('admin.prestamos', ['prestamos'=>$prestamos], ['llaves'=>$llaves]);
    }

    public function mostrarPrestamosInstructor(){
        $user = Auth::user();
        $documento = $user->documento;

        $prestamos = Prestamos::select('prestamos.*', 'users.name','u.name as usuario','llaves.id_ambiente' ,'ambientes.nombre_ambiente')
        ->where('documento_instructor', '=', $documento)
        ->join('users', 'prestamos.documento_instructor', 'users.documento')
        ->rightjoin('users as u', 'prestamos.id_usuario', 'u.id')
        ->join('llaves', 'prestamos.id_llave', 'llaves.id')
        ->join('ambientes', 'llaves.id_ambiente', 'ambientes.id')->get();

        $llaves = Llaves::select('llaves.id as id_llave','llaves.id_ambiente','llaves.estado','ambientes.*')
        ->join('ambientes', 'llaves.id_ambiente', '=', 'ambientes.id')->get();

        return view('admin.prestamos', ['prestamos'=>$prestamos], ['llaves'=>$llaves]);
    }

    public function crearPrestamo(Request $request){
        $prestamos = new Prestamos;
        if($request->input('id-llave')==0){
            session()->flash('estado', 'Escoja una llave');
            return to_route('prestamos');
        }else{
            $doc = $request->input('documento');
            $documento_instructor = User::select('documento')->where('documento', '=', $doc)->get();

            if(count($documento_instructor)>=1){
                $date = Carbon::now();
                $date->setTimezone('America/Bogota');
                $estado_default = 'Abierto';

                $id = Auth::id();

                $prestamos->id_llave = $request->input('id-llave');
                $prestamos->documento_instructor = $request->input('documento');
                $prestamos->id_usuario = $id;
                $prestamos->estado_prestamo = $estado_default;
                $prestamos->fecha = $date->toDateString();
                $prestamos->hora = $date->toTimeString();
                $prestamos->save();

                $ocupado = 'ocupado';
                $id_llave = $request->input('id-llave');
                $llaves = Llaves::find($id_llave);
                $llaves->estado = $ocupado;
                $llaves->save();

                return to_route('prestamos');
            }else{
                session()->flash('estado', 'El instructor no existe');
                return to_route('prestamos');
            }
        }
    }

    public function cerrarPrestamo(Request $request, $llave){
        $id = $request->input('input-prestamo');
        $prestamos = Prestamos::find($id);
        $prestamos->estado_prestamo = 'Cerrado';
        $prestamos->save();

        $llaves = Llaves::find($llave);
        $llaves->estado = 'Disponible';
        $llaves->save();
        return to_route('prestamos');

    }

    public function devolver(Request $request, $llave){
        $id = $request->input('input-prestamo');
        $prestamos = Prestamos::find($id);
        $prestamos->estado_prestamo = 'Devolucion en solicitud';
        $prestamos->save();

        $llaves = Llaves::find($llave);
        $llaves->estado = 'Esperando devolucion';
        $llaves->save();
        return to_route('prestamos_instructor');

    }
}

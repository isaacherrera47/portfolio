<?php

namespace App\Http\Controllers;

use App\Permiso;
use Illuminate\Http\Request;

use App\Http\Requests;

class AccesoController extends Controller
{
    public function index(Request $request, $id){
        if (!($permiso = $this->isUserValid($request))) {
            return view('permisos.index');
        } elseif (!$permiso->isAdmin) {
            return redirect()->route('proyectos.index');
        }
        $permiso = Permiso::find($id);
        return view('permisos.lista_accesos',['permiso' => $permiso]);
    }

    private function isUserValid(Request $request) {
        if ($request->hasCookie('email')) {
            $email = $request->cookie('email');
            return Permiso::where('email',$email)->first();
        }
        return false;
    }
}

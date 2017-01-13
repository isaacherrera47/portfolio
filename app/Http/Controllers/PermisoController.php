<?php

namespace App\Http\Controllers;

use App\Acceso;
use App\Permiso;
use Illuminate\Http\Request;

use App\Http\Requests;

class PermisoController extends Controller
{
    public function create(Request $request) {
        if (!($permiso = $this->isUserValid($request))) {
            return view('permisos.index');
        } elseif (!$permiso->isAdmin) {
            return view('proyectos.index');
        }

        $permisos = Permiso::all();

        return view('permisos.create',['permisos' => $permisos]);
    }

    public function check(Request $request) {
        $user_mail = $request->input('email');
        if ($permiso = Permiso::where('email', $user_mail)->first()) {
            $acceso = new Acceso();
            $permiso->accesos()->save($acceso);
            return redirect('/')->withCookie('email',$user_mail);
        }
        return view('permisos.index',['error' => 1]);
    }

    public function index() {
        return view('permisos.index');
    }

    public function store(Request $request) {
        if (Permiso::where('email', $request->input('email'))->first()) {
            return redirect()->back()->with('data',['']);
        }

        $permiso = new Permiso();
        $permiso->email = $request->input('email');
        $permiso->isAdmin = $request->has('isAdmin');
        $permiso->save();

        return redirect('/');
    }

    public function destroy($id) {
        $permiso = Permiso::find($id);
        $permiso->delete();

        return redirect('/');
    }

    private function isUserValid(Request $request) {
        if ($request->hasCookie('email')) {
            $email = $request->cookie('email');
            return Permiso::where('email',$email)->first();
        }
        return false;
    }
}

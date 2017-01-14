<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Permiso;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!($permiso = $this->isUserValid($request))) {
            return view('permisos.index');
        }
        $proyectos = Proyecto::all()->sortByDesc('prioridad');
        Return view('proyectos.index', ['proyectos' => $proyectos, 'permiso' => $permiso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!($permiso = $this->isUserValid($request))) {
            return view('permisos.index');
        } elseif (!$permiso->isAdmin) {
            return redirect()->route('proyectos.index');
        }
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->input('nombre');
        $proyecto->extracto = $request->input('extracto');
        $proyecto->contenido = $request->input('contenido');
        $proyecto->prioridad = $request->input('prioridad');
        $proyecto->lenguaje = $request->input('lenguaje');
        $proyecto->save();

        $imagen = $request->file('portada');
        $filename = $proyecto->id . '.' . $imagen->getClientOriginalExtension();
        $imagenes = $request->file('slider');
        $proyecto->portada = $filename;

        $ruta_portada = base_path() . '/public/img/covers';
        $ruta_slider = base_path() . '/public/img/slider/' . $proyecto->id;

        $imagen->move($ruta_portada, $filename);
        foreach ($imagenes as $img) {
            $name = $img->getClientOriginalName();
            $img->move($ruta_slider, $name);
        }

        $proyecto->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!($permiso = $this->isUserValid($request))) {
            return view('permisos.index');
        }
        $proyecto = Proyecto::findOrFail($id);
        $ignorar = array('..', '.');
        $files = scandir(base_path() . '/public/img/slider/' . $id);
        foreach ($files as $item) {
            if (!in_array($item, $ignorar)) {
                $imagenes[] = strval($item);
            }
        }

        return view('proyectos.detail', ['proyecto' => $proyecto, 'imagenes' => $imagenes, 'permiso' => $permiso]);
    }

    public function edit(Request $request, $id)
    {
        if (!($permiso = $this->isUserValid($request))) {
            return view('permisos.index');
        } elseif (!$permiso->isAdmin) {
            return redirect()->route('proyectos.index');;
        }

        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', ['proyecto' => $proyecto]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $ruta_portada = public_path() . '/img/covers';
        $ruta_slider = public_path() . '/img/slider/' . $proyecto->id;

        $proyecto->nombre = $request->input('nombre');
        $proyecto->extracto = $request->input('extracto');
        $proyecto->contenido = $request->input('contenido');
        $proyecto->prioridad = $request->input('prioridad');
        $proyecto->lenguaje = $request->input('lenguaje');

        if ($request->hasFile('portada')) {
            Storage::disk('public')->delete('img/covers/' . $proyecto->portada);
            $imagen = $request->file('portada');
            $filename = $proyecto->id . '.' . $imagen->getClientOriginalExtension();
            $imagen->move($ruta_portada, $filename);
            $proyecto->portada = $filename;
        }

        if ($request->hasFile('slider')) {
            $imagenes = $request->file('slider');
            if (!$request->has('conservar_slider')) {
                Storage::disk('public')->deleteDirectory('img/slider/' . $proyecto->id);
            }

            foreach ($imagenes as $img) {
                $name = $img->getClientOriginalName();
                $img->move($ruta_slider, $name);
            }
        }

        $proyecto->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);

        Storage::disk('public')->delete('img/covers/' . $proyecto->portada);
        Storage::disk('public')->deleteDirectory('img/slider/' . $id);

        $proyecto->delete();

        return redirect('/');
    }

    private function isUserValid(Request $request)
    {
        if ($request->hasCookie('email')) {
            $email = $request->cookie('email');
            return Permiso::where('email', $email)->first();
        }
        return false;
    }
}

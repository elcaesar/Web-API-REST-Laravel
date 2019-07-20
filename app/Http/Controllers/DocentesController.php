<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use App\Asignatura;
use App\Http\Requests\DocenteRequest;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doc = Docente::docente($request->apellido)
                ->orderBy('apellido', 'ASC')
                ->paginate(5);

        return view('docentes.list')->with('docs', $doc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asig = Asignatura::where('plan_id','1');

        return view('docentes.create')->with('asig', $asig);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocenteRequest $request)
    {
        $docente = new Docente($request->all());
        $docente->save();
        flash('Los datos del docente se agregaron correctamente.')->success();
        return redirect()->route('docentes.list');
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
        $doc = Docente::find($id);
        return view('docentes.edit')->with('docente', $doc);
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
        $doc = Docente::find($id);
        $doc->nombre = $request->nombre;
        $doc->apellido = $request->apellido;
        $doc->email = $request->email;
        $doc->save();

        flash('Los datos se actualizaron correctamente.')->success();
        return redirect()->route('docentes.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verasignaturas($id)
    {
        $doc = Docente::find($id);

        return view('docentes.verAsignaturas')->with('docs', $doc);
    }
}

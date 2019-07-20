<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Plan;
use App\Cursada;
use Laracasts\Flash\Flash;
use Session;

use Illuminate\Support\Facades\DB;


class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $asig = Asignatura::asignatura($request->nombre)
                ->orderBy('plan_id', 'DESC')
                ->paginate(10);
              
        return view('asignaturas.list')->with('asigs', $asig);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaturas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $asignatura = new Asignatura($request->all());

        $asignatura->save();
        flash('La asignatura se almacenó correctamente.')->success();
        //return redirect()->route('asignaturas.list');
        return redirect()->route('asignaturas.verplan', $asignatura->plan_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asig = Asignatura::find($id);
        $plan = Plan::find($asig->plan_id);
        return view('asignaturas.edit')->with(['asignatura' => $asig , 'plan' => $plan]);
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

        $asig = Asignatura::find($id);
        $asig->nombre = $request->nombre;
        $asig->plan_id = $request->plan_id;
        $asig->anio = $request->anio;
        $asig->regimen = $request->regimen;
        $asig->save();

        return redirect()->route('asignaturas.verplan', $asig->plan_id);
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

    public function verdocentes($id)
    {
        $asig = Asignatura::find($id);
        $plan = Plan::find($asig->plan_id);
        return view('asignaturas.verDocentes')->with(['asigs' => $asig , 'planes' => $plan]);
    }

    public function verplan(Request $request, $plan)
    {
        $asig = Asignatura::asignatura($request->nombre)
                            ->where('plan_id', $plan)
                            ->orderBy('anio', 'ASC')
                            ->paginate(10);
        $plan = Plan::where('id', $plan)->first();
        return view('asignaturas.list')->with(['asigs' => $asig , 'plan' => $plan]);
    }

    public function detallecursadas($idasig, $anioplan)
    {
        $cursada = Cursada::where('asignatura_id', $idasig)->get();
        $asig = Asignatura::where('id', $idasig)->first();
        $plan = Plan::where('id', $asig->plan_id)->first();
        return view('cursadas.list')->with(['cursadas' => $cursada, 'plan' => $plan, 'asig' => $asig]);
    }

    public function vercursadas($id)
    {
        //devuelve las cursadas segun la asignatura de acuerdo a una peticíón Ajax
        return $cursada = Cursada::where('asignatura_id', $id)->get();
    }
}

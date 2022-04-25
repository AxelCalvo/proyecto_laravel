<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleccion;

class EleccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elecciones= Eleccion::all();
        return view ('eleccion/list', compact('elecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('eleccion/create');
    }

    function validateData(Request $request)
    {
        $request->validate([
            'periodo' => 'required|max:50',
            'fecha' => 'required',
            'apertura' => 'required',
            'horaApertura' => 'required',
            'cierre' => 'required',
            'horaCierre' => 'required',
            'observaciones' => 'required|max:100',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);

        $campos
            = array(
                'periodo'           => $request->periodo,
                'fecha'             => $request->fecha,
                'fechaapertura'     => $request->apertura,
                'horaapertura'      => $request->horaApertura,
                'fechacierre'       => $request->cierre,
                'horacierre'        => $request->horaCierre,
                'observaciones'     => $request->observaciones,
            );
        Eleccion::create($campos);
        echo " Eleccion guarda correctamente ... ";
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
        $eleccion=Eleccion::find($id);
        return view ('eleccion/edit', compact('eleccion'));
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
        $this->validateData($request);

        $campos
            = array(
                'periodo'           => $request->periodo,
                'fecha'             => $request->fecha,
                'fechaapertura'     => $request->apertura,
                'horaapertura'      => $request->horaApertura,
                'fechacierre'       => $request->cierre,
                'horacierre'        => $request->horaCierre,
                'observaciones'     => $request->observaciones,
            );
        Eleccion::whereId($id)->update($campos);
        return redirect('eleccion')->with('success', 'Actualizado correctamente...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Eleccion::whereId($id)->delete();
        return redirect('eleccion');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casilla;
use Barryvdh\DomPDF\Facade as PDF; 
class CasillaControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casillas= Casilla::all();
        return view('casilla/list', compact ('casillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('casilla/create');
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

        $data['ubicacion']=$request->ubicacion;
        $casilla=Casilla::create($data);
        return redirect('casilla')->with('success',
        $casilla->ubicacion . ' Guardada satisfactoriamente...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo"Element $id ";///"Element".$id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $casilla=Casilla::find($id);
    return view('casilla/edit',compact('casilla'));
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
       $data['ubicacion']=$request->ubicacion;
       Casilla::whereId($id)->update($data);
       return redirect('casilla')
       ->with('success','Actualizado correctamente....');

    }

    function validateData(Request $request)
    {

        $request->validate([
            'ubicacion'=>'required|max:100',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Casilla::whereId($id)->delete();
       return redirect('casilla');
    }
    public function generatepdf()    {
        $casillas = Casilla::all();               
         $pdf = PDF::loadView('casilla/list', ['casillas'=>$casillas]);               
         return $pdf->download('archivo.pdf');
        /* $html =  "<div style='text-align:center;'>
         <h1>PDF generado desde etiquetas html</h1> 
         <br>
         <h3>&copy;.dev</h3> 
         </div>";     
            
         $pdf = PDF::loadHTML($html);        
         return $pdf->download('archivo.pdf');    */
         /*$casillas = Casilla::all();    
         return PDF::loadView('casilla/list', ['casillas'=>$casillas]???stream('archivo.pdf');*/
        
        }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cita;
use Illuminate\Http\Request;
use App\Mail\CitasConfirmaMail;
use Illuminate\Support\Facades\Mail;


class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente_id=session('LoggedUser');
        $citas = Cita::where('cliente_id',$cliente_id)->get();
        return view('dashboard.citas_inicio')->with(compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.citas_crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cliente_id = session('LoggedUser');
        $cita = new Cita();
        $cita->cliente_id = $cliente_id;
        $cita->mascota = $request->mascota;
        $cita->dia = $request->dia;
        $cita->hora = $request->hora;
        if ($request->has('servicio')) {
            $tipoVisita = $request->servicio;

            if ($tipoVisita === 'veterinario') {
                $cita->tipoDeVisita = 'Veterinario';
            } elseif ($tipoVisita === 'estetica') {
                $cita->tipoDeVisita = 'Estética';
            }
        }
        $cita->save();

        $details = [
            'mascota' =>$request->mascota,
            'dia' =>$request->dia,
            'hora' =>$request->hora,
            'tipoDeVisita'=>$request->servicio

        ];
$data =Admin::find(session('LoggedUser'));
$correo =$data->email;

        Mail::to($correo)->send(new CitasConfirmaMail($details));
        return redirect()-> route('inicio');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**

     */
    public function edit(Cita $cita)
    {

  return view('dashboard.citas_editar')->with(compact('cita'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $cita->mascota = $request->mascota;
        $cita->dia = $request->dia;
        $cita->hora = $request->hora;

        if ($request->has('servicio')) {
            $tipoVisita = $request->servicio;

            if ($tipoVisita === 'veterinario') {
                $cita->tipoDeVisita = 'Veterinario';
            } elseif ($tipoVisita === 'estetica') {
                $cita->tipoDeVisita = 'Estética';
            }
        }

        $cita->save();


        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route("citas.index");
    }
}

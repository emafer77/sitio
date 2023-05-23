<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $data = Admin::find(session('LoggedUser'));
        $nombre = $data->nombre.''.$data->name;
        return view('dashboard.welcome')->with(compact('nombre'));
    }
    public function  enviar(){
        $data = Admin::find(session('LoggedUser'));
        $email = $data->email.''.$data->email;
        return  ('email');
    }
}

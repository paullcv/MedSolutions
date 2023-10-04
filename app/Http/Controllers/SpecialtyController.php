<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // mostrar especialidades
    public function index(){
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    // ir al formulario de crear especialidad
    public function create(){
        return view('specialties.create');
    }

    // crear especialidad
    public function sendData(Request $request){
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        return redirect('/especialidades');
    }
}

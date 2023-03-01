<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Medico extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Medico::class, 'medico');
    }

    public function index()
    {
        $medicos = Medico::paginate(25);
        return view('/medicos/index', ['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidads = Especialidad::all();
        return view('medicos/create', ['especialidads' => $especialidads]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'fecha_contratacion' => 'required|date',
            'vacunado' => 'required|boolean',
            'sueldo' => 'required|numeric',
            'especialidad_id' => 'required|exists:especialidads,id',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $medico = new Medico($request->all());
        $medico->user_id = $user->id;
        $medico->save();
        session()->flash('success', 'Médico creado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        $especialidads = Especialidad::all();
        return view('medicos/show', ['medico' => $medico, 'especialidads' => $especialidads]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        $especialidads = Especialidad::all();
        return view('medicos/edit', ['medico' => $medico, 'especialidads' => $especialidads]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'fecha_contratacion' => 'required|date',
            'vacunado' => 'required|boolean',
            'sueldo' => 'required|numeric',
            'especialidad_id' => 'required|exists:especialidads,id',
        ]);
        $user = $medico->user;
        $user->fill($request->all());
        $user->save();
        $medico->fill($request->all());
        $medico->save();
        session()->flash('success', 'Médico modificado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('medicos.index');
    }


    public function destroy(Medico $medico)
    {
        if($medico->delete()){
            session()->flash('success', 'Médico borrado')
        }
   
    else{
        session()->flash('success', 'Médico no borrado')
    }
    return redirect()->route('medicos.index');
    }





}

<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class EmpleadosController extends Controller
{
    
    public function index()
    {
        //se traen los datos de la tabla empleados y se muestran de  5 en  5
        $datos['empleados']=Empleados::paginate(10);
       
       //los datos de la tabla son retornados juntos a la vista index.blade.
        return view('empleados.index',$datos);
    }
 
    
    public function create()
    {
        return view('empleados.create');
    }

    
    public function store(Request $request)
    {


        //validaciones
        $campos=[
            'nombre' => 'required|string|max:100',
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'correo' => 'required|email',
            'foto' => 'required|max:10000|mimes:jpg,png,jpg'
        ];

        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);



        //Capta todos los datos que envía el POST de create.blade.php
        //$datosEmpleado = request()->all();

        $datosEmpleado = request()->except('_token');


        if($request->hasFile('foto')){
            //en bd -> en form
            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
            
        }

        //llama al modelo y hace un insert.
        Empleados::insert($datosEmpleado);

        //redireccion a la vista index, y de paso manda el mensaje que caiga en el if
        return redirect('empleados')->with('Mensaje','Empleado agregado con éxito');
    }

    
    public function show(Empleados $empleados)
    {
        //
    }

    
    public function edit($id)
    {
        

        //return vista empleados.edit compact $empleado = empleads::find...
        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));

    }

    
    public function update(Request $request, $id)
    {

        //validaciones
        $campos=[
            'nombre' => 'required|string|max:100',
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'correo' => 'required|email'
            
        ];

        

        if($request->hasFile('foto')){
            
            $campos+=['foto' => 'required|max:10000|mimes:jpg,png,jpg'];
            
        }
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        
        
        $datosEmpleado = request()->except(['_token', '_method']);

        if($request->hasFile('foto')){
            
            //busca los datos antiguos para borrar la foto después
            $empleado = Empleados::findOrFail($id);

            //se borra la foto antigua
            Storage::delete('public/'.$empleado->foto);

            
            //en bd -> en form, uplodea la foto nueva
            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
            
        }
        
        Empleados::where('id','=',$id)->update($datosEmpleado);

        //return vista empleados.edit compact $empleado = empleads::find...
        //$empleado = Empleados::findOrFail($id);
        //return view('empleados.edit', compact('empleado'));


        return redirect('empleados')->with('Mensaje','Empleado modificado con éxito');


    }

    
    public function destroy($id)
    {

        
        $empleado = Empleados::findOrFail($id);

            //si se borró la foto...
        if(Storage::delete('public/'.$empleado->foto)){

            //borro el usuario
            Empleados::destroy($id);

        }
    
        //return redirect('empleados');
        return redirect('empleados')->with('Mensaje','Empleado eliminado con éxito');
    }
}

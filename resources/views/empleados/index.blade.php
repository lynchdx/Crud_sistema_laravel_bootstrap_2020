<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
crossorigin="anonymous">

<div class="container">

<!--Si existe variable mensaje mostrará dicho mensaje, el mensaje viene de store en controller-->
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<a href="{{ url('empleados/create')}}" class="btn btn-success">Agregar un empleado</a>
<br>
<br>

<table class="table table-light  table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <img src="{{ asset('storage').'/'. $empleado->foto}}" class="img-thumbnail img-fluid" width="100"> 
            </td>
            
            
            <td>{{ $empleado->nombre}} {{ $empleado->apellidoPaterno}} {{ $empleado->apellidoMaterno}}</td>
            <td>{{ $empleado->correo}}</td>
            <td>
                <a class="btn btn-warning" href="{{ url('/empleados/'.$empleado->id.'/edit') }}">Editar</a>
                
                

                <form  method="post" action="{{ url('/empleados/'.$empleado->id) }}" style="display-inline">
                {{ csrf_field() }}    
                {{ method_field('DELETE') }}
                
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?)">Borrar</button>

                </form>


            </td>
        </tr>
    @endforeach    
    </tbody>
</table>
</div>
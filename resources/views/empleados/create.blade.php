<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
crossorigin="anonymous">


<div class="container">

    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif

Sección para crear empleados
<form class="form-horizontal" action="{{ url('/empleados') }}" method="POST" enctype="multipart/form-data">
    
    {{ csrf_field() }}
    <!--esto sirve para la inclusión de contenido en otros lados, hacia el form.blade-->
    @include('empleados.form', ['Modo'=>'crear'])


</form>


</div>
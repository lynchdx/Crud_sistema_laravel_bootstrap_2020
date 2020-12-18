<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
crossorigin="anonymous">


<div class="container">

<form  method="post" action=" {{ url('/empleados/'.$empleado->id)}} " enctype="multipart/form-data">

    <!--al hacer patch, va de una al método update-->
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('empleados.form', ['Modo'=>'editar'])


</form>

</div>
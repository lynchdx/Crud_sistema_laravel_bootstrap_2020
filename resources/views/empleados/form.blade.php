
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>  
    <input class="form-control {{ $errors->has('nombre')?'is-invalid':'' }}" type="text" name="nombre" id="nombre" 
    value="{{ isset($empleado->nombre)?$empleado->nombre:old('nombre') }}"
    >
    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>')  !!}
    
</div>

<div class="form-group">
    <label class="control-label" for="Apellido Paterno">{{'Apellido Paterno'}}</label>  
    <input class="form-control {{ $errors->has('apellidoPaterno')?'is-invalid':'' }}"  type="text" name="apellidoPaterno" id="apellidoPaterno" 
    value="{{ isset($empleado->apellidoPaterno)?$empleado->apellidoPaterno:old('apellidoPaterno') }}"
    >    
    {!! $errors->first('apellidoPaterno', '<div class="invalid-feedback">:message</div>')  !!}
</div>


<div class="form-group">
    <label class="control-label" for="Apellido Materno">{{'Apellido Materno'}}</label>  
    <input class="form-control {{ $errors->has('apellidoMaterno')?'is-invalid':'' }}"   type="text" name="apellidoMaterno" id="apellidoMaterno" 
    value="{{ isset($empleado->apellidoMaterno)?$empleado->apellidoMaterno:old('apellidoMaterno') }}"
    >
    {!! $errors->first('apellidoMaterno', '<div class="invalid-feedback">:message</div>')  !!}
</div>

<div class="form-group">
    <label class="control-label" for="Correo">{{'Correo'}}</label>  
    <input class="form-control {{ $errors->has('correo')?'is-invalid':'' }}" type="email" name="correo" id="correo" 
    value="{{ isset($empleado->correo)?$empleado->correo:old('correo') }}"
     >
     {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>')  !!}
</div>


<div class="form-group">
    <label class="control-label" for="nombre">{{'Foto'}}</label>  
    @if(isset($empleado->foto))
</br>
    <img  class="img-thumbnail img-fluid" src="{{ asset('storage').'/'. $empleado->foto}}" alt="" width="200"> 
</br>
    @endif
    <input class="form-control {{ $errors->has('foto')?'is-invalid':'' }}" type="file" name="foto">
    {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>')  !!}

</br>
</div>
    

    <input class="btn btn-success" type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">
    <a class="btn btn-primary" href="{{ url('empleados')}}">Regresar</a>
@extends('dashboard.cita_nueva')

@section('content')
    <form action="{{route('citas.update',$cita->id)}}" method="post">
        <fieldset>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="mascota">Nombre de la mascota</label>
                <input type="text" name="mascota" id="mascota" value="{{$cita->mascota}}"
                       class="form-control">
            </div>
            <div class="form-group">
                <label for="dia">Dia</label>
                <input type="date" class="form-group"
                       name="dia" id="dia" value="{{$cita->dia}}" required >
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" class="form-group"
                       name="hora" id="hora" value="{{$cita->hora}}">
            </div>
            <div class="form-group">
                <label for="tipo_servicio">Tipo de servicio</label><br>
                <input type="radio" name="servicio" id="veterinario" value="veterinario" @if ($cita->tipoDeVisita === 'Veterinario') checked @endif>
                <label for="veterinario">Veterinario</label>
                <br>
                <input type="radio" name="servicio" id="estetica" value="estetica" @if ($cita->tipoDeVisita === 'Estética') checked @endif>
                <label for="estetica">Estética</label>


            </div>


            <button type="submit" class="btn btn-primary">Modificar Cita</button>
        </fieldset>
    </form>



@endsection

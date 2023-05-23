

@extends('dashboard.cita_nueva')

@section('content')
    <form action="{{route('citas.store')}}" method="post">
        <fieldset>
            @csrf
            <div class="form-group">
                <label for="mascota">Nombre de la mascota</label>
                <input type="text" name="mascota" id="mascota" class="form-control">
            </div>
            <div class="form-group">
                <label for="dia">Dia</label>
                <input type="date" name="dia" id="dia" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora">
            </div>
            <div class="form-group">
                <label>Selecciona el servicio:</label>
                <div>
                    <input type="radio" id="veterinario" name="servicio" value="veterinario">
                    <label for="veterinario">Veterinario</label>
                </div>
                <div>
                    <input type="radio" id="estetica" name="servicio" value="estetica">
                    <label for="estetica">Estética</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Crear Cita</button>
        </fieldset>
    </form>

@endsection

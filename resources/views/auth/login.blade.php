<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">
<div class="row" style="margin-top: 45px">

    <div class="col-md-4 col-md-offset-4">
<h4>Inicio de sesion</h4><hr>
        <form action="{{route('auth.check')}}" method="post">

            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @csrf
            <div class="form-group">
                <label>Correo</label>
                <input type="text" class="form-control" name="email" placeholder="Introduzca su direccion  de correo Electronico" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Introduzca su contraseña">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn-block btn-primary">Iniciar Sesion</button>
            <br>
            <a href="{{ route('auth.register') }}">No cuento con una cuenta, crear una nueva</a>

        </form>

    </div>
</div>

</div>
</body>
</html>

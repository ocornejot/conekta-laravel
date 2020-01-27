<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuración de conekta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    {!! Form::model($conekta, ['route' => ['conekta.configuration.update',$conekta->id], 'method'=>'PUT','class'=>'']) !!}
        <div style="padding: 10px">
            <h4 style="text-align: center;">Conekta</h4>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    {{ Form::label('private_key', 'Llave privada:', ['class' => 'control-label']) }}
                    {{ Form::text('private_key', null, ['class' => 'form-control ' . ($errors->has('private_key') ? 'is-invalid' : ''), 'maxlength' => '100', 'required']) }}
                </div>
                @if ($errors->has('private_key'))
                    <div class="text-danger">
                        <small>{{ $errors->first('private_key') }}</small>
                    </div>
                @endif
                <div class="form-group">
                    {{ Form::label('public_key', 'Llave pública:', ['class' => 'control-label']) }}
                    {{ Form::text('public_key', null, ['class' => 'form-control ' . ($errors->has('public_key') ? 'is-invalid' : ''), 'maxlength' => '100', 'required']) }}
                </div>
                @if ($errors->has('public_key'))
                    <div class="text-danger">
                        <small>{{ $errors->first('public_key') }}</small>
                    </div>
                @endif
            </div>

            <div style="text-align: center;">
                <button type="submit" class="btn btn-success">
                    Guardar
                </button>
                <a class="btn btn-default">
                    Cancelar
                </a>
            </div>
        </div>
    {!!Form::close() !!}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



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

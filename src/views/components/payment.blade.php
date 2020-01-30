{{ Form::open(['route' => 'conekta.create_order', 'method' => 'POST', 'id' => 'card-form']) }}

{{--// <style> sólo útil para el ejemplo--}}
<style>
    table td:first-child {
        text-align: right;
    }
</style>

<div class="card">
    <div class="card-body">

        {{--// [INICIA] Sólo útil para el ejemplo--}}
        <div class="row justify-content-md-center" style="background: lightgray; border-radius: 5px; padding: 5px 0;">
            <div class="col-md-12">
                <h4 style="text-align: center;">Información de ejemplo</h4>
            </div>
            <div class="col-md-6">
                <table class="table table-sm table-borderless">
                    <thead>
                    <tr>
                        <td colspan="2">
                            <h6 style="text-align: center;">PRODUCTO</h6>
                        </td>
                    </tr>
                    </thead>
                    <tr>
                        <td>
                            <label class="control-label">nombre:</label>
                        </td>
                        <td>
                            <input type="text" name="items[0][name]" class="form-control form-control-sm" value="producto de prueba" placeholder="nombre de producto">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label">descripción:</label>
                        </td>
                        <td>
                            <input type="text" name="items[0][description]" class="form-control form-control-sm" value="descripción de producto de prueba" placeholder="descripción del producto de prueba">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label">precio unitario:</label>
                        </td>
                        <td>
                            <input type="number" name="items[0][unit_price]" class="form-control form-control-sm" value="100.00" placeholder="precio unitario de producto" step=".01">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label">cantidad:</label>
                        </td>
                        <td>
                            <input type="number" name="items[0][quantity]" class="form-control form-control-sm" value="1" placeholder="cantidad de producto" min="1">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-sm table-borderless">
                    <thead>
                    <tr>
                        <td colspan="2">
                            <h6 style="text-align: center;">CLIENTE</h6>
                        </td>
                    </tr>
                    </thead>
                    <tr>
                        <td>
                            <label class="control-label">nombre:</label>
                        </td>
                        <td>
                            <input type="text" name="customer[name]" class="form-control form-control-sm" value="cliente de prueba" placeholder="nombre de cliente">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label">teléfono:</label>
                        </td>
                        <td>
                            <input type="text" name="customer[phone]" class="form-control form-control-sm" value="+55 1231231231" placeholder="teléfono de cliente">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label">email:</label>
                        </td>
                        <td>
                            <input type="email" name="customer[email]" class="form-control form-control-sm" value="prueba@mail.com" placeholder="email de cliente">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        {{--// [TERMINA] Sólo útil para el ejemplo--}}

        <div class="row justify-content-md-center">
            <div class="col-md-6 col-lg-4 col-sm-12">
                <h6>ELIGE UN MÉTODO DE PAGO</h6>
                <div class="custom-control custom-radio">
                    <input type="radio" id="rd-oxxo" name="paymentType" class="custom-control-input" value="oxxo" v-model="paymentType" checked onclick="radioBtn(this)" data-panel="oxxo-frm">
                    <label class="custom-control-label" for="rd-oxxo" checked>
                        Oxxo <br>
                        <img src="{{ asset('/img/conekta/oxxo_logo.svg.png') }}" alt="oxxo" style="max-height: 30px; width: auto;">
                    </label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="rd-card" name="paymentType" class="custom-control-input" value="card" v-model="paymentType" onclick="radioBtn(this)" data-panel="card-frm">
                    <label class="custom-control-label" for="rd-card">
                        Tarjeta bancaria crédito/débito <br>
                        <img src="{{ asset('/img/conekta/cards_logo.png') }}" alt="card" style="max-height: 30px; width: auto;">
                    </label>
                </div>
            </div>
        </div>
        <div id="card-frm" class="pfrm" style="display: none;">
            <hr>
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <span class="card-errors" style="color: #ae1c13;"></span>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        {{ Form::number('card_no', null, ['class' => 'form-control', 'maxlength' => '16', 'id' => 'card-no','placeholder' => 'Número de la tarjeta', 'onkeypress' => 'maxlength(this.id, event)']) }}
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        {{ Form::text('card_owner', null, ['class' => 'form-control', 'maxlength' => '50', 'placeholder' => 'Nombre del titular de la tarjeta']) }}
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        {!! Form::select('card_type', ['Visa' => 'Visa', 'Mastercard' => 'Mastercard'], 'Visa', ['class'=>'form-control','placeholder'=>'Tipo de tarjeta']) !!}
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        {!! Form::select('month', [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => '11', 12 => '12',], [], ['class'=>'form-control', 'placeholder' => 'Mes']) !!}
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        {!! Form::select('year', ['2020' => '2020'], [], ['class'=>'form-control', 'placeholder' => 'Año']) !!}
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        {{ Form::number('cvc', null, ['class' => 'form-control', 'id' => 'cvc', 'maxlength' => '3', 'placeholder' => 'CVC', 'onkeypress' => 'maxlength(this.id, event)', 'min' => '1']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align: center; padding: 10px">
    <button type="submit" class="btn btn-success btn-flat">
        Generar pago
    </button>
</div>
{{ Form::close() }}

@push('js')
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    <script>
        $(function () {
            Conekta.setPublicKey('{!! $conekta->public_key !!}');

            $("#card-form").submit(submitForm);
        });

        var submitForm = function (event) {
            if ($('#rd-oxxo').is(':checked'))
                return true;

            var $form = $(this);
            var tokenData = {
                'card': {
                    'number': $('[name=card_no]').val(),
                    'name': $('[name=card_owner]').val(),
                    'exp_year': $('[name=year]').val(),
                    'exp_month': $('[name=month]').val(),
                    'cvc': $('[name=cvc]').val(),
                }
            };

            $form.find("button").prop("disabled", true);
            Conekta.Token.create(tokenData, conektaSuccessResponseHandler, conektaErrorResponseHandler);
            return false;
        }

        /**
         * Handles conekta successful response
         * @param Conekta token
         * @return void
         */
        var conektaSuccessResponseHandler = function(token) {
            var $form = $("#card-form");
            $form.append($('<input type="hidden" name="conektaTokenId" id="conektaTokenId">').val(token.id));
            $form.get(0).submit(); //Hace submit
        };

        /**
         * Handles conekta error response
         * @param Http response
         * @return void
         */
        var conektaErrorResponseHandler = function(response) {
            var $form = $("#card-form");
            $form.find(".card-errors").text(response.message_to_purchaser);
            $form.find("button").prop("disabled", false);
        };

        /**
         * Shows/Hides conekta card form
         * @param HTML/Object that
         * @return void
         */
        function radioBtn(that)
        {
            let panel = that.dataset['panel'];
            $('.pfrm').hide();
            $(`#${panel}`).show();
        }
    </script>
@endpush

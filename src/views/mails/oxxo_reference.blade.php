<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        h4 {
            background: #008a85;
            border-radius: 5px;
            padding: 5px;
            color: white;
        }
        table {
            width: 100%;
        }
        table td {
            width: 33%;
        }
        p {
            text-align: left;
        }

        .opps {
            width: 696px;
            border-radius: 4px;
            box-sizing: border-box;
            padding: 0 45px;
            margin: 40px auto;
            overflow: hidden;
            border: 1px solid #b0afb5;
            font-family: 'Open Sans', sans-serif;
            color: #4f5365;
        }

        .opps-reminder {
            position: relative;
            top: -1px;
            padding: 9px 0 10px;
            font-size: 11px;
            text-transform: uppercase;
            text-align: center;
            color: #ffffff;
            background: #000000;
        }

        .opps-info {
            margin-top: 26px;
            position: relative;
        }

        .opps-info:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;

        }

        .opps-brand {
            width: 45%;
            float: left;
        }

        .opps-brand img {
            max-width: 150px;
            margin-top: 2px;
        }

        .opps-ammount {
            width: 55%;
            float: right;
        }

        .opps-ammount h2 {
            font-size: 36px;
            color: #000000;
            line-height: 24px;
            margin-bottom: 15px;
        }

        .opps-ammount h2 sup {
            font-size: 16px;
            position: relative;
            top: -2px
        }

        .opps-ammount p {
            font-size: 10px;
            line-height: 14px;
        }

        .opps-reference {
            margin-top: 14px;
        }

        .h1Ref {
            font-size: 27px;
            color: #000000;
            text-align: center;
            margin-top: -1px;
            padding: 6px 0 7px;
            border: 1px solid #b0afb5;
            border-radius: 4px;
            background: #f8f9fa;
        }

        .opps-instructions {
            margin: 32px -45px 0;
            padding: 32px 45px 45px;
            border-top: 1px solid #b0afb5;
            background: #f8f9fa;
            text-align: left;
        }

        ol {
            margin: 17px 0 0 16px;
        }

        li + li {
            margin-top: 10px;
            color: #000000;
        }

        a {
            color: #1155cc;
        }

        .opps-footnote {
            margin-top: 22px;
            padding: 22px 20 24px;
            color: #108f30;
            text-align: center;
            border: 1px solid #108f30;
            border-radius: 4px;
            background: #ffffff;
        }

    </style>

</head>
<body style="padding: 30px">
<div style="text-align: center;width: 90%;margin: auto;">
    <div class="opps" id="oxxo_reference">
        <div class="opps-header">
            <div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
            <div class="opps-info">
                <div class="opps-brand"><img src="{{ config('app.url') . '/img/conekta/oxxo_pay.png' }}" alt="OXXOPay"></div>
                <div class="opps-ammount">
                    <h3>Monto a pagar</h3>
                    <h2>${!! $order->amount/100!!} <sup>MXN</sup></h2>
                    <p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
                </div>
            </div>
            <div class="opps-reference">
                <h3>Referencia</h3>
                <h1 class="h1Ref">{!! $order->charges[0]->payment_method->reference !!}</h1>
                <img src="{{ $order->charges[0]->payment_method->barcode_url }}">
            </div>
            <div>
                <p>La siguiente orden tiene vigencia hasta:
                    <strong style=" text-align: right; color: red">
                        {!!\Carbon\Carbon::createFromTimestamp($order->charges[0]->payment_method->expires_at)->format('d-m-Y') !!}
                    </strong></p>
            </div>
        </div>
        <div class="opps-instructions">
            <h3>Instrucciones</h3>
            <ol>
                <li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
                <li>Indica en caja que quieres realizar un pago de <strong>OXXOPay</strong>.</li>
                <li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
                <li>Realiza el pago correspondiente con dinero en efectivo.</li>
                <li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
            </ol>
            <div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>{{ config('app.name') }}</strong> confirmando tu pago.</div>
        </div>
    </div>


</div>
</body>
</html>

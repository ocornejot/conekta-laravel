@component('mail::message')
# Gracias por su pago {{ $order['object']['customer_info']['name'] }}

Recibimos su pago de ${{ $order['object']['amount'] / 100 }}

@component('mail::table')
    | Producto       | Precio         |
    | -------------  |:-------------: |
    @foreach($order['object']['line_items']['data'] as $item)
        | {{ $item['name'] }} | ${{ $item['unit_price'] / 100 }} |
    @endforeach
@endcomponent



@component('mail::button', ['url' => config('app.url')])
Ir a la página
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent

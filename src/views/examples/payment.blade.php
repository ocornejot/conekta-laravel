@extends('conekta::layouts.main')

@section('title', 'Ejemplo de pagos')

@section('content')
    @component('conekta::components.payment', ['conekta' => $conekta])
    @endcomponent
@endsection

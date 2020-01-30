@extends('conekta::layouts.main')

@section('title', 'Configuración de conekta')

@section('content')
    @component('conekta::components.configuration', ['conekta' => $conekta])
    @endcomponent
@endsection

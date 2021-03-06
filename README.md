# Paquete Conekta-Laravel

_No aseguro darle mantenimiento a este paquete, úsalo bajo tu propia resposabilidad._

[![issues](https://img.shields.io/github/issues/ocornejot/conekta-laravel)](https://github.com)
[![forks](https://img.shields.io/github/forks/ocornejot/conekta-laravel)](https://github.com)
[![stars](https://img.shields.io/github/stars/ocornejot/conekta-laravel)](https://github.com)
[![Total Downloads](https://poser.pugx.org/ocornejo/conekta-laravel/downloads.png)](https://packagist.org/packages/ocornejo/conekta-laravel)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/ocornejo/conekta-laravel)

Este paquete está diseñado para usarse en Laravel 5.*

##### Contenido:
* Funcionalidad de webhook.
* Formulario (componente reutilizable) para configurar las llaves pública y privada de conekta.
* Formulario (componente reutilizable) de pagos oxxo/tarjeta.
* Funcionalidad activa para guardar los pagos pendientes y realizados.
* Correo electrónico de referencia para pago en tienda oxxo.
* Correo electrónico de pago recibido (oxxo/tarjeta).

## Requerimientos

* PHP >= 5.4
* Laravel 5.*

## Instalación

Para instalar el paquete con **composer**:

```
$ composer require ocornejo/conekta-laravel
```

si tu versión de Laravel es inferior a 5.4 es necesario registrar el _provider_ en `config/app.php`

```php
'providers' => [
    ...,
    Ocornejo\Conekta\ConektaServiceProvider::class,
]
```

## Configuración
Es necesario ejecutar el siguiente comando:

```
$ php artisan vendor:publish --provider="Ocornejo\Conekta\ConektaServiceProvider"
```

Para que conekta detecte el webhook en tu proyecto, pega la siguiente línea de código en `routes/api.php`

```php
Route::post('conekta/webhook', 'ConektaController@webhook');
```
Ahora registra la siguiente ruta en [Conekta](https://admin.conekta.com/settings/webhooks) en la configuración de webhooks `<tu-ruta>/api/conekta/webhook`


## Pruebas

Puedes acceder a la siguiente ruta para hacer pruebas del formulario de pagos oxxo/tarjetas
`<tu-ruta>/conekta/payment-example`

## Licencia

The MIT License (MIT). 

<?php

namespace Ocornejo\Conekta\Http\Controllers;

use Conekta\Conekta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConektaController extends Controller
{

    public function __construct()
    {
        Conekta::setApiKey('key_e5n9fMq4hp2Sy1Uz3zJAPg');
        Conekta::setApiVersion("2.0.0");
    }

    public function webhook(Request $request)
    {
        switch ($request->type) {
            case 'order.paid':
                //TODO
                break;
            case 'charge.paid':
                //TODO
                break;
            case 'subscription.created':
                //TODO
                break;
            case 'subscription.paid':
                //TODO
                break;
        }

        logger('WEBHOOK LOG', [
            'data' => print_r($request->data, true)
        ]);

        return response('webhook done', 200);
    }


}

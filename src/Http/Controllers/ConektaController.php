<?php

namespace Ocornejo\Conekta\Http\Controllers;

//use Conekta\Order;
use Conekta\Conekta;
//use App\Configuration;
//use App\Mail\ReceiptMail;
//use App\Order as OrderModel;
//use Illuminate\Http\Request;
//use App\Mail\OxxoReferenceMail;
//use App\Conekta as ConektaModel;
//use Illuminate\Support\Facades\Mail;
//use App\Services\SubscriptionService;
//use App\Services\ShoppingCartService as SCS;

use App\Http\Controllers\Controller;

class ConektaController extends Controller
{
//    use SCS;

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

        logger(print_r($request->data, true));

        return response('', 200);
    }


}

<?php

namespace App\Http\Controllers;

use App\Payment;
use Conekta\Order;
use Conekta\Conekta;
use Illuminate\Http\Request;
use App\Mail\OxxoReferenceMail;
use App\Conekta as ConektaModel;
use App\Http\Request\ConektaRequest;
use Illuminate\Support\Facades\Mail;
use Ocornejo\Conekta\Traits\ConektaTrait as ct;

class ConektaController extends Controller
{

    use ct;

    public $conekta;

    /**
     * ConektaController constructor.
     */
    public function __construct()
    {
        $this->conekta = ConektaModel::firstOrCreate(['id' => 1]);
        Conekta::setApiKey($this->conekta->private_key);
        Conekta::setApiVersion(config('conekta.api_version'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('conekta::examples.configuration', [
            'conekta' => $this->conekta
        ]);
    }

    /**
     * @param ConektaRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ConektaRequest $request)
    {
        $this->conekta->update($request->all());
        return redirect('/conekta/configuration')->with(['message' => [
            'title' => 'Actualizado',
            'text' => 'Se actualizó correctamente',
        ]]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder(Request $request)
    {
        try{
            $data = self::formatData($request->all());
            $order = Order::create($data);

            Payment::create([
                'amount' => ($order->amount / 100),
                'conekta_id' => $order->id,
                'type' => $order->charges[0]['payment_method']->type,
                'status' => $order->payment_status,
                'metadata' => $order->charges[0]['payment_method'],
            ]);

            if ($request->paymentType == 'oxxo')
                Mail::to($data['customer_info']['email'])->send(new OxxoReferenceMail($order));

            return response()->json($order);
        } catch (\Conekta\ProcessingError $error){
            logger('ConektaController - ProcessingError', ['error:' => print_r($error->getMessage(), true)]);
            return response()->json($error->getMessage(), 404);
        } catch (\Conekta\ParameterValidationError $error){
            logger('ConektaController - ParameterValidationError', ['error:' => print_r($error->getMessage(), true)]);
            return response()->json($error->getMessage(), 404);
        } catch (\Conekta\Handler $error){
            logger('ConektaController - Handler', ['error:' => print_r($error->getMessage(), true)]);
            return response()->json($error->getMessage(), 404);
        }
    }
}

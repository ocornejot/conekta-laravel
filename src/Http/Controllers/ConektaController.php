<?php

namespace Ocornejo\Conekta\Http\Controllers;

use Conekta\Conekta;
use Illuminate\Http\Request;
use App\Conekta as ConektaModel;
use App\Http\Controllers\Controller;

class ConektaController extends Controller
{

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
        return view('conekta::components.configuration', [
            'conekta' => $this->conekta
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $this->conekta->update($request->all());
        return redirect('/conekta/configuration');
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


}

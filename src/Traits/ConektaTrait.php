<?php

namespace Ocornejo\Conekta\Traits;

trait ConektaTrait
{
    /**
     * @param array $items
     * @param string $paymentType
     * @param int $total
     * @return array
     */
    public static function formatData(array $data = [])
    {
        return array(
            'line_items'=> array(
                $data['items']
            ),
            'currency'    => 'mxn',
            'charges'     => array(
                array(
                    'payment_method' => self::getPaymentFormat($data),
                    'amount' => (int) self::getAmountFormat($data['amount'])
                )
            ),
            'currency'      => 'mxn',
            'customer_info' => $data['customer']
        );
    }

    /**
     * @param $paymentType
     * @return array
     */
    protected static function getPaymentFormat($data)
    {
        $paymentData = [];

        switch ($data['paymentType']) {
            case 'card':
                $paymentData = [
                    'type' => 'card',
                    "token_id" => $data['conektaTokenId']
                ];
                break;
            case 'spei':
                $paymentData = [
                    'type' => 'spei',
                    'expires_at' => strtotime(date("Y-m-d H:i:s")) + "36000"
                ];
                break;
            default:
                $paymentData = [
                    'type' => 'oxxo_cash',
                    'expires_at' => strtotime(date("Y-m-d H:i:s")) + "36000"
                ];
                break;
        }

        return $paymentData;
    }

    /**
     * @param $amount
     * @return mixed
     */
    protected static function getAmountFormat($amount)
    {
        return str_replace(['$', ',', '.'], '', $amount);
    }
}

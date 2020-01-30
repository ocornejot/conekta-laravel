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
        $items = self::setItemsUnitPriceAmountFormat($data['items']);
        return array(
            'line_items'=> $items,
            'currency'    => 'mxn',
            'charges'     => array(
                array(
                    'payment_method' => self::getPaymentFormat($data),
                    'amount' => (int) self::getTotalAmount($items)
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
        if (strpos($amount, '.'))
            return (int) str_replace(['$', ',', '.'], '', $amount);
        else
            return (int) str_replace(['$', ','], '', ($amount . '00'));
    }

    /**
     * @param $items
     * @return mixed
     */
    protected static function setItemsUnitPriceAmountFormat($items)
    {
        foreach ($items as $i => $item) {
            $items[$i]['unit_price'] = self::getAmountFormat($item['unit_price']);
        }
        return $items;
    }

    /**
     * @param $items
     * @return int|mixed
     */
    protected static function getTotalAmount($items)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['unit_price'];
        }
        return $total;
    }
}

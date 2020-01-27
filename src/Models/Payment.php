<?php

namespace Ocornejo\Conekta\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'amount',
        'conekta_id',
        'type',
        'metadata',
        'approved_at',
    ];

    /**
     * @param $paymentMethod
     */
    public function setMetadataAttribute($paymentMethod)
    {
        $this->attributes['metadata'] = json_encode($paymentMethod);
    }
}

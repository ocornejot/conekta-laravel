<?php

namespace Ocornejo\Conekta\Models;

use Illuminate\Database\Eloquent\Model;

class Conekta extends Model
{
    protected $table = 'conekta';

    protected $fillable = [
        'private_key',
        'public_key',
    ];
}

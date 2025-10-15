<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardCollection extends Model
{
    protected $fillable = [
        'card_id',
        'name',
        'image_url',
        'type_line',
        'set_name',
        'mana_cost',
        'quantity'
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'client_name',
        'phone',
        'email',
        'address',
        'total_price',
        'order_id',
        'status',
    ];
}

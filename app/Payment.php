<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Order;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'payed_at',
        'order_id',
    ];

    /**
     * The attributes that shoul be mutated to dates.
     * 
     * @var array
     */
    protected $dates = [
        'payed_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

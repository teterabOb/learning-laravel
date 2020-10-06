<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',        
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

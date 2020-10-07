<?php

namespace App;

use HasFactory; 
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

}


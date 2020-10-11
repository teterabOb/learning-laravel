<?php

namespace App\Services;
use Illuminate\Support\Facades\Cookie;
use App\Cart;

class CartService
{
    protected $cookieName = 'cart';

    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieName);
        $cart = Cart::find($cartId);
        return $cart;
    }
    public function getFromCookieOrCreate()
    {        
        $cart = $this->getFromCookie();
        return $cart ?? Cart::create();
    }
    public function makeCookie(Cart $cart)
    {
        return $cookie = Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);    
    }
    public function countProducts()
    {
        $cart = $this->getFromCookie();
        if(!is_null($cart)){
        // if($cart != null){
            return $cart->products->pluck('pivot.quantity')->sum();
        }
        return 0;
    }

}

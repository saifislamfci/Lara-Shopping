<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    protected $fillable=[
    'product_id',
    'user_id',
    'order_id',
    'ip_address',
    'product_quantity',
];
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

  public static function totalCarts()
  {
    if (Auth::check()) {
      $carts = Cart::where('user_id', Auth::id())
      ->orWhere('ip_address', request()->ip())
      ->where('order_id', NULL)
      ->get();
    }else {
      $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
    }
    return $carts;
  }

/**
 * total Items in the cart
 * @return integer total item
 */
  public static function totalItems()
  {
    $carts = Cart::totalCarts();

    $total_item = 0;

    foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
    }
    return $total_item;
  }
  }
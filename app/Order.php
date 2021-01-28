<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
    'user_id',
    'ip_address',
    'name',
    'phone_no',
    'shipping_address',
    'email',
    'message',
    'is_paid',
    'transaction_id',
    'payment_id',
    'is_completed',
    'is_seen_by_admin',
];

public function Payment()
{
    return $this->belongsTo(Payment::class);
}
public function User()
{
    return $this->belongsTo(User::class);
}
public function carts()
{
    return $this->hasMany(Cart::class);
}


}

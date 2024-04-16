<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = ['numOrder','Date','deliveryTime','PaymentMethod','customer_email','created_at','updated_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_email','email');
    }

    public function lineorders()
    {
        return $this->hasMany(Lineorder::class,'numOrder','numOrder');
    }
}

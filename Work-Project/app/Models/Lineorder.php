<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lineorder extends Model
{
    use HasFactory;

    protected $table = 'lineorder';

    protected $fillable = ['id','numOrder','product_code','product_name','product_description','product_price','created_at','updated_at'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
}

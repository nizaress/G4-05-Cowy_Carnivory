<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['cod','name','description','price', 'category','vendor_id','vendor_email','vendor_name','created_at','updated_at'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function lineorders()
    {
        return $this->hasMany(LineOrder::class, 'product_id', 'id');
    }
}

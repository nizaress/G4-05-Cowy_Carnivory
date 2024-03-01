<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['cod','name','description','price','vendor_email','vendor_name','created_at','updated_at'];

    public function vendor()
    {
    return $this->belongsTo(Vendor::class, 'vendor_email', 'email');
    }


    public function lineorders()
    {
        return $this->hasMany(Lineorder::class,'product_code','cod');
    }
}

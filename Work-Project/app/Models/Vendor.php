<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendor';

    protected $fillable = ['email','name','phone_number','address','accountNumber', 'category','created_at','updated_at'];

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id', 'id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = ['email',
                            'name',
                            'password',
                            'address',
                            'phone_number',
                            'card_number',
                            'created_at',
                            'updated_at'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}

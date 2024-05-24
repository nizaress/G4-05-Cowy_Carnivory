<?php
// app/Models/VendorVote.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorVote extends Model
{
    use HasFactory;

    protected $table = 'vendor_votes';

    protected $fillable = ['user_id', 'vendor_id', 'rating'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

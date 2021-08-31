<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';

    protected $fillable = [
        'user_id', 'cart_id', 'transaction_id'
    ];

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }

}

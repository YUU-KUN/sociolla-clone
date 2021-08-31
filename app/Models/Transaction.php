<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'address', 'province_id', 'regency_id', 'district_id', 'village_id', 'payment_image', 'total', 'status'
    ];


    public function Province()
    {
        return $this->hasMany(Province::class);
    }
    public function Regency()
    {
        return $this->hasMany(Regency::class);
    }
    public function District()
    {
        return $this->hasMany(District::class);
    }
    public function Village()
    {
        return $this->hasMany(Village::class);
    }
}

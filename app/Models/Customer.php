<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Customer extends Model
{
    use HasFactory;
    public function invoice()
    {
        return $this->hasMany(Invoices::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'name',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'user_id',
    ];

}

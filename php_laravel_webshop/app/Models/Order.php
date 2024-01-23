<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $guarded = ['id'];

    use SoftDeletes;

    public function orderedProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

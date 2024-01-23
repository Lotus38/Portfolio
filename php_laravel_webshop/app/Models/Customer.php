<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    protected $guarded = ['id'];
    
    use hasRoles;

    use SoftDeletes;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }



    // public function getAuthIdentifierName()
    // {
    //     return 'first_name';
    // }
}
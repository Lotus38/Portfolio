<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Customer;

class AdminUserSeeder extends Seeder
{
    public function run():void
    {
        {
            $user = new Customer;
            $user->first_name = 'SuperAdmin';
            $user->password = bcrypt(config("admin_password.name"));
            $user->save();
    
            $adminRole = Role::where('name', 'admin')->first();
            $user->assignRole($adminRole);
        }
    }
}
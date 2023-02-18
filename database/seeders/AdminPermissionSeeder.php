<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create(['name' => 'view user']);
        $user = User::whereHas('roles' , function($query){
                                    $query->where('name' , 'Admin');
                                })->first();
        $user->givePermissionTo('view user');
    }
}

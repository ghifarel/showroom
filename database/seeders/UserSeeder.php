<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facedes\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer1 = User::create([
            'name'          => 'customer',
            'email'         => 'customer1234@gmail.com',
            'password'      => bcrypt('customer1234'),
            'role'          => 'customer'
        ]);
        $customer1->assignRole('customer');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sangcahaya.id',
            'password' => bcrypt('sangcahaya.id'),
            'is_paten' => 1
        ]);
    }
}

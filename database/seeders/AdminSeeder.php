<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $admin = [
            'name' => 'Admin',
            'email' => 'thiraphat@admin.com',
            'password' => bcrypt('password'),
        ];

        Admin::create($admin);
    }
}

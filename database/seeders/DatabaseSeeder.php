<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();


        $user =
            [

                [
                    'name' => 'Admin GET',
                    'email' => 'get@admin.com',
                    'is_admin' => '1',
                    'password' => bcrypt('password1234')
                ],

                [
                    'name' => 'Admin GET',
                    'email' => 'get@admin.com',
                    'is_admin' => '1',
                    'password' => bcrypt('password1234')
                ],
            ];

            foreach($user as $key => $value) {
                User::create($value);
            }
        // \App\Models\User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'user@user.com'
        // ]);

        // \App\Models\Admin::factory(1)->create();
        //    $this->call(AdminSeeder::class);

    }
}

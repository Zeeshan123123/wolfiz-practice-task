<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( User::count() > 0 ) {
            return;
        }

        User::factory(1)->create([
            'name'  => 'Wolfiz Technologies',
            'email' => 'admin@wolfiz.com',
            'password' => bcrypt('password')
        ]);
    }
}

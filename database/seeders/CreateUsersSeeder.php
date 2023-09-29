<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'type' => '0',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Verifikator',
                'email' => 'verifikator@verifikator.com',
                'type' => '1',
                'password' => bcrypt('verifikator'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $waleed = User::create([
            'user_name' => 'waleed waleed',
            'email' => 'waleed@admin.com',
            'password' => bcrypt('Www123456#'),
            'about' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam commodi, provident harum velit sequi dignissimos. Tempore modi illo cupiditate magnam quasi, ipsa ex provident distinctio nesciunt nulla aspernatur. Aut, laborum!'
        ]);
        $waleed->makeAdmin('supervisor');
    }
}
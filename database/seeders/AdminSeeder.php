<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $waleed = User::first();
        // $waleed->makeAdmin('supervisor');
        $users = User::where('id', '!=', '1')->get()->random(10);
        $roles = ['moderator', 'admin'];
        foreach ($users as $user) {
            $user->makeAdmin($roles[rand(0, 1)]);
        }
    }
}
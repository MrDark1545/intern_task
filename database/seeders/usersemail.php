<?php

namespace Database\Seeders;
use App\Models\Useremail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersemail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails = [
            ['email' => 'admin@admin.com'],
            ['email' => 'usama@admin.com'],
            ['email' => 'usama17312@gmail.com'],
            ['email' => 'yasinusama@admin.com'],
            ['email' => 'yasinusama414@admin.com'],
            ['email' => 'yasinusama414@gmail.com'],
        ];

        foreach ($emails as $email) {
            $user = User::inRandomOrder()->first(); // Get a random user
            UserEmail::create([
                'email' => $email['email'],
                'user_id' => $user->id,
            ]);
        }
    }
}


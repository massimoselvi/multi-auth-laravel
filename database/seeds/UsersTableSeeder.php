<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = collect([
            [
                'name' => 'userA',
                'email' => 'userA@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'userB',
                'email' => 'userB@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'userC',
                'email' => 'userC@example.com',
                'password' => 'password',
            ],
        ]);

        $userData->map(function ($newUserData) {
            if (!$newUser = User::where('email', $newUserData['email'])->first()) {
                $newUser = factory(User::class, 1)->create([
                    'name' => $newUserData['name'],
                    'email' => $newUserData['email'],
                    'password' => bcrypt($newUserData['password']),
                ]);
            }
        });

    }
}

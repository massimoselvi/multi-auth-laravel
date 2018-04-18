<?php

use App\AdminUser;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUserData = collect([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => 'secret',
            ],
            [
                'name' => 'another admin',
                'email' => 'another-admin@example.com',
                'password' => 'secret',
            ],
        ]);

        $adminUserData->map(function ($newUserData) {
            if (!$newUser = AdminUser::where('email', $newUserData['email'])->first()) {
                $newUser = factory(AdminUser::class, 1)->create([
                    'name' => $newUserData['name'],
                    'email' => $newUserData['email'],
                    'password' => bcrypt($newUserData['password']),
                ]);
            }
        });
    }
}

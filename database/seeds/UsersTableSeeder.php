<?php

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
        $user = App\User::create([
            'name' => 'Espoirken',
            'email' => 'gilbert_kenneth04@yahoo.com',
            'password' => bcrypt('123123'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpeg',
            'about' => 'Lorem ipsum expedita.',
            'facebook' => 'https://www.facebook.com/',
            'youtube' => 'https://www.youtube.com/',
        ]);


    }
}

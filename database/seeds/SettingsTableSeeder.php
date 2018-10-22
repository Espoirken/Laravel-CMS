<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => "Laravel's Blog",
            'contact_number' => "34515",
            'contact_email' => "settings@gmail.com",
            'address' => "NewYork",
        ]);
    }
}

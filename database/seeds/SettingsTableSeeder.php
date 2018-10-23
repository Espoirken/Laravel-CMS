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
            'site_name' => "Espoirken",
            'contact_number' => "09663616476",
            'contact_email' => "gilbertcaburnay@gmail.com",
            'address' => "150 Nepa Corner Paulino Street",
        ]);
    }
}

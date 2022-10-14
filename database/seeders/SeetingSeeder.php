<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'location'=>'Palestint-Tulkarem',
           'phone'=>'0595578080',
           'email'=>'shop@gmail.com',
           'facebook'=>'https://www.facebook.com/shop',
           'twitter'=>'https://twitter.com/shop',
            'linkedin'=>'https://www.linkedin.com/in/shop/',
            'instagram'=>'https://instagram.com/shop',
          'pin'=>'https://www.pinterest.com/shop/',
        ]);
    }
}

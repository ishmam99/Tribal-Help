<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Super Admin',
            'username'  => 'admin',
            'email' =>  'admin@mail.com',
            'password' =>  Hash::make(123123123),
            'usertype'  => 0,
            'mobile'    =>  '01236547890',
            'position'  =>  'ADMIN',

        ]);
        User::create([
            'name'  => 'UNO',
            'username'  => 'uno',
            'email' =>  'uno@mail.com',
            'password' =>  Hash::make(123123123),
            'usertype'  => 1,
            'mobile'    =>  '01236547890',
            'position'  =>  'UNO',

        ]);
        // \App\Models\User::factory(10)->create();
        Subject::create(['name' => 'ভুমি অভিযোগ']);
        Subject::create(['name' => 'ঘরবাড়ি / বাসস্থানের জন্য আবেদন']);
        Subject::create(['name' => 'সার্বিক সাহায্য']);
        Subject::create(['name' => 'ভাতা']);
        Subject::create(['name' => 'সনদপত্র']);
        Subject::create(['name' => 'ঔষুধ/ চিকিৎসা']);
        Subject::create(['name' =>  'IGA']);
    }
}

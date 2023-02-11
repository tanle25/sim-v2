<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'email'=>'tanltps04690@gmail.com',
            'password'=>Hash::make('Tanle@123'),
            'name'=>'Tan le',
            'phone'=>'0972685031',
            'status'=>true,
            'avatar'=>'assets/img/team-1.jpg',
            'is_admin'=>false
        ]);
        User::create([
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('Tanle@123'),
            'name'=>'Admin',
            'phone'=>'0972685033',
            'status'=>true,
            'avatar'=>'assets/img/team-2.jpg',
            'is_admin'=>true
        ]);
    }
}

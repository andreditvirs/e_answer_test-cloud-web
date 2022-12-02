<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->uuid = 'a89056e7-2fea-41b3-968e-9c4d9cfa12b6';
        $user->username = 'u12345';
        $user->password = Hash::make('12345678');
        $user->name = 'User Test 1';
        $user->role = 'user';
        $user->gender = 'LK';
        $user->position_in_company = 'Secertary';
        $user->address = 'Candi, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'D-III';
        $user->education_prody = 'IT';
        $user->companies_id = Company::where('name', 'Telkom Indonesia')->first()->id;
        $user->save();
    }
}

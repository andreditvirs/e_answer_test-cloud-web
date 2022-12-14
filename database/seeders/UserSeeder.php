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

        $user = new User();
        $user->uuid = 'a89056e7-2fea-41b3-968e-9c4d9cfa12b6';
        $user->username = 'u23456';
        $user->password = Hash::make('12345678');
        $user->name = 'User Test 2';
        $user->role = 'user';
        $user->gender = 'LK';
        $user->position_in_company = 'Programmer';
        $user->address = 'Bandung, Jawa Barat';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'D-IV';
        $user->education_prody = 'TEKKOM';
        $user->education_institution = 'Telkom University';
        $user->companies_id = Company::where('name', 'Gojek Indonesia')->first()->id;
        $user->save();

        $user = new User();
        $user->uuid = 'a89056e7-2fea-41b3-968e-9c4d9cfa12b6';
        $user->username = 'u34567';
        $user->password = Hash::make('12345678');
        $user->name = 'User Test 3';
        $user->role = 'user';
        $user->gender = 'LK';
        $user->position_in_company = 'Secertary';
        $user->address = 'Malang, Jatim';
        $user->birthplace = 'Surabaya';
        $user->birthday = '2000-11-01';
        $user->education_level = 'D-III';
        $user->education_prody = 'IT';
        $user->companies_id = Company::where('name', 'Indofood Indonesia')->first()->id;
        $user->save();

        $user = new User();
        $user->uuid = 'a89056e7-2fea-41b3-968e-9c339cfa12b6';
        $user->username = 'u45678';
        $user->password = Hash::make('12345678');
        $user->name = 'User Test 4';
        $user->role = 'user';
        $user->gender = 'LK';
        $user->position_in_company = 'Developer Web';
        $user->address = 'Waru, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'D-I';
        $user->education_prody = 'IT';
        $user->companies_id = Company::where('name', 'Indofood Indonesia')->first()->id;
        $user->save();

        $user = new User();
        $user->uuid = 'i82346e7-2fea-41b3-968e-9c4d9cfa1111';
        $user->username = 'o12345';
        $user->password = Hash::make('12345678');
        $user->name = 'Operator Test 1';
        $user->role = 'operator';
        $user->gender = 'LK';
        $user->position_in_company = 'Manager';
        $user->address = 'Candi, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'D-I';
        $user->education_prody = 'IT';
        $user->companies_id = Company::where('name', 'Telkom Indonesia')->first()->id;
        $user->save();

        $user = new User();
        $user->uuid = '6b56a42d-9eb7-4abd-86a0-0e84fc453a4d';
        $user->username = 'p12345';
        $user->password = Hash::make('12345678');
        $user->name = 'Psikolog Test 1';
        $user->role = 'psychologist';
        $user->gender = 'PR';
        $user->position_in_company = 'Psikolog Umum';
        $user->address = 'Candi, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'S-1';
        $user->education_prody = 'Psikolog';
        $user->save();

        $user = new User();
        $user->uuid = '0c6abebd-eac2-42a2-992c-33e47c507526';
        $user->username = 'a12345';
        $user->password = Hash::make('12345678');
        $user->name = 'Admin Test 1';
        $user->role = 'admin';
        $user->gender = 'LK';
        $user->position_in_company = 'Admin';
        $user->address = 'Candi, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'S-1';
        $user->education_prody = 'Psikolog';
        $user->save();

        $user = new User();
        $user->uuid = '0c6abebd-eac2-42a2-1111-33e47c507526';
        $user->username = 'telkom1';
        $user->password = Hash::make('12345678');
        $user->name = 'Company Test 1';
        $user->role = 'company';
        $user->gender = 'LK';
        $user->position_in_company = 'Admin';
        $user->address = 'Candi, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'S-1';
        $user->education_prody = 'Psikolog';
        $user->companies_id = Company::where('name', 'Telkom Indonesia')->first()->id;
        $user->save();

        $user = new User();
        $user->uuid = '0c6abebd-eac2-42a2-1111-33e47c507526';
        $user->username = 'gojek2';
        $user->password = Hash::make('12345678');
        $user->name = 'Company Test 2';
        $user->role = 'company';
        $user->gender = 'LK';
        $user->position_in_company = 'Admin';
        $user->address = 'Candi, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'S-2';
        $user->education_prody = 'Psikolog';
        $user->companies_id = Company::where('name', 'Gojek Indonesia')->first()->id;
        $user->save();

        $user = new User();
        $user->uuid = '0c6abebd-eac2-42a2-1111-33e47c507526';
        $user->username = 'indofood3';
        $user->password = Hash::make('12345678');
        $user->name = 'Company Test 3';
        $user->role = 'company';
        $user->gender = 'LK';
        $user->position_in_company = 'Admin';
        $user->address = 'Candi, Sidoarjo';
        $user->birthplace = 'Sidoarjo';
        $user->birthday = '1999-12-01';
        $user->education_level = 'S-2';
        $user->education_prody = 'Psikolog';
        $user->companies_id = Company::where('name', 'Indofood Indonesia')->first()->id;
        $user->save();
    }
}

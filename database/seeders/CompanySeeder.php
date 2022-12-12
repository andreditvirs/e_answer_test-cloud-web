<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company->name = "Telkom Indonesia";
        $company->address = "Surabaya, Jawa Timur";
        $company->type = "PT";
        $company->save();

        $company = new Company();
        $company->name = "Gojek Indonesia";
        $company->address = "Surabaya, Jawa Timur";
        $company->type = "PT";
        $company->save();

        $company = new Company();
        $company->name = "Indofood Indonesia";
        $company->address = "Surabaya, Jawa Timur";
        $company->type = "PT";
        $company->save();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = new Test();
        $test->name = "INTELLIGENZ STRUKTUR TEST";
        $test->url_image = "assets/images/ist.png";
        $test->duration = 71;
        $test->type = "IST";
        $test->save();

        $test = new Test();
        $test->name = "KRAEPELIN";
        $test->url_image = "assets/images/kraepelin.jpg";
        $test->duration = 20;
        $test->type = "KRAEPELIN";
        $test->save();
    }
}

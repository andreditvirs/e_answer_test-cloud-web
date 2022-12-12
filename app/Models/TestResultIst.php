<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResultIst extends Model
{
    use HasFactory;

    protected $table = 'test_result_ist';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function tester()
    {
        return $this->hasOne(User::class, 'id', 'testers_id');
    }

    public function test()
    {
        return $this->hasOne(Test::class, 'name', 'tests_name');
    }
}

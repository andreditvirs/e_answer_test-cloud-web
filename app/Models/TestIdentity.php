<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestIdentity extends Model
{
    use HasFactory;

    protected $table = 'test_identities';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function test()
    {
        return $this->hasOne(Test::class, 'id', 'tests_id');
    }
}

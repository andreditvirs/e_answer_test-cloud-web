<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestIdentityTemp extends Model
{
    use HasFactory;

    protected $table = 'test_identities_temp';
    protected $guarded = [];
}

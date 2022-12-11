<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'companies_id');
    }
}

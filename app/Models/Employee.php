<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Employee extends Authenticatable
{
    use HasFactory, HasRoles, HasApiTokens;

    protected $fillable = [
        'fname',
        'lname',
        'company_id',
        'email',
        'phone',
        'password',
    ];

    public function Company()
    {
        return $this->belongsto(Company::class);
    }
}

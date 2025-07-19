<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class GovernmentUser extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'government_users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Important: Tell Spatie to use the 'government' guard
    protected string $guard_name = 'government';
}

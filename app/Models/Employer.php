<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'email',
        'password',
        'peso_approved',
        'dole_approved',
    ];

    protected $casts = [
        'peso_approved' => 'boolean',
        'dole_approved' => 'boolean',
    ];

    public function documents()
    {
        return $this->hasMany(EmployerDocument::class);
    }
}

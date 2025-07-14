<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'document_type',
        'file_path',
        'status',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}

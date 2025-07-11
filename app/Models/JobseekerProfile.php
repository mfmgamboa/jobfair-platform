<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobseekerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'sex',
        'civil_status',
        'birthdate',
        'birthplace',
        'age',
        'religion',
        'height',
        'weight',
        'blood_type',
        'email',
        'mobile_number',
        'telephone_number',
        'present_address',
        'permanent_address',
        'employment_status',
        'preferred_occupation',
        'preferred_industry',
        'willing_to_work_local',
        'willing_to_work_abroad',
        'willing_to_work_immediately',
        'educational_level',
        'school_name',
        'course',
        'year_graduated',
        'honors',
        'skills',
        'languages',
        'certifications',
        'resume_path'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

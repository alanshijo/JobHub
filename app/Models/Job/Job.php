<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'tbl_jobs';

    protected $fillable = [
        'id',
        'job_title',
        'job_region',
        'company_name',
        'job_type',
        'vacancy',
        'expericence',
        'salary',
        'gender',
        'application_deadline',
        'job_description',
        'responsibilities',
        'education_experience',
        'other_benefits',
        'company_logo',
    ];

    public $timestamps = true;
}

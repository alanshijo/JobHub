<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'tbl_jobapplications';

    protected $fillable = [
        'application_id',
        'cv_file',
        'user_id',
        'job_id',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}

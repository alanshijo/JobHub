<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveJob extends Model
{
    use HasFactory;

    protected $table = 'tbl_savedjobs';

    protected $fillable = [
        'saved_id',
        'job_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}

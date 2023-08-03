<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_categories';

    protected $fillable = [
        'cat_id ',
        'category_name',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}

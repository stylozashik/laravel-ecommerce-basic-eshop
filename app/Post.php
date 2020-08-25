<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'post_title',
        'psoted_by',
        'ratings',
        'post_description',
        'post_image',
        'posting_time',
        'posting_date',
    ];
}

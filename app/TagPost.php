<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    protected $table = 'tag_post';

    protected $fillable = [
        'tag_id',
        'post_id'
    ];

    public $timestamps = false;
}

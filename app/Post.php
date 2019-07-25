<?php

namespace App;

use App\Support\Croppper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $guarded = [];

    public function has_tag($tag_id)
    {
        $rows = \DB::table('tag_post')->where('tag_id', '=', $tag_id)->where('post_id', '=', $this->id)->get();

        if (count($rows) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function userObject()
    {
        return $this->belongsTo(User::class,  'user', 'id');
    }

    public function getPublishedAttribute($value)
    {
        return ($value == 1 ? true : false);
    }

    public function getCoverAttribute($value)
    {
        if (!empty($value)) {
            return Storage::url(Croppper::thumb($value, 800, 600));
        }

        return '';
    }
}

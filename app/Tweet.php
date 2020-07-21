<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'text',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderByDesc('id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tweets_tags');
    }
}

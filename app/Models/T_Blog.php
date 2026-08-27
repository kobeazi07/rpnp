<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class T_Blog extends Model
{
    use HasFactory;
    protected $table = 't_blog';
    protected $guarded = [];

    public function blog_id()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
    public function tag_id()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}

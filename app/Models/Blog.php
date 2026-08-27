<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $guarded = [];
    public function rkategori_blog()
    {
        return $this->belongsTo(Kategori_Blog::class, 'kategori_id', 'id');
    }
    public function galeri_blog()
    {
        return $this->hasMany(G_Blog::class, 'blog_id');
    }

    public function tag_blog()
    {
        return $this->hasMany(T_Blog::class, 'blog_id');
    }
}

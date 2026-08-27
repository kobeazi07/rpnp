<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    protected $guarded = [];

    public function Rtag_blog()
    {
        return $this->hasMany(T_Blog::class, 'tag_id');
    }
}

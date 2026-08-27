<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Career extends Model
{
    use HasFactory;
    protected $table = 'career';
    protected $guarded = [];



    public function Rkategori_career()
    {
        return $this->belongsTo(Kategori_Career::class, 'kategori_career', 'id');
    }
}

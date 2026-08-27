<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'portfolio';
    protected $guarded = [];

    public function rbuilding_type()
    {
        return $this->belongsTo(Building_Type::class, 'buildingtype_id', 'id');
    }
    public function rkategori_portfolio()
    {
        return $this->belongsTo(Kategori_Portfolio::class, 'kategori_portfolio_id', 'id');
    }
    public function galeri_portfolio()
    {
        return $this->hasMany(G_Portfolio::class, 'portfolio_id');
    }
}

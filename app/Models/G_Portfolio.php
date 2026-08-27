<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class G_Portfolio extends Model
{
    use HasFactory;
    protected $table = 'g_portfolio';
    protected $guarded = [];

    public function portfolio_id()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');
    }
}

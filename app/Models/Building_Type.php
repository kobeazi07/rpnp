<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building_Type extends Model
{
    use HasFactory;
    protected $table = 'building_type';
    protected $guarded = [];
}

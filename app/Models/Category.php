<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, SoftDeletes, NodeTrait;

    public function scopeIsActive($query){
        $query->where('status',0);
    }
}

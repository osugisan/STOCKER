<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
        'box_img', 'name', 'description', 'memo', 'user_id'
    ];
}

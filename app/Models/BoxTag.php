<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoxTag extends Model
{
    protected $fillable = [
        'box_id', 'tag_id'
    ];
}

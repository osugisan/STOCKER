<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Box extends Model
{
    protected $fillable = [
        'box_img', 'name', 'description', 'memo', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'box_tags')->withTimestamps();
    }
}

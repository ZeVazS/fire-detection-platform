<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    protected $fillable = ['nome', 'url_feed', 'zone_id'];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}


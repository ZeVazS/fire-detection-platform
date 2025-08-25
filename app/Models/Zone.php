<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['nome', 'gps', 'risco', 'user_id'];

    public function cameras()
    {
        return $this->hasMany(Camera::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


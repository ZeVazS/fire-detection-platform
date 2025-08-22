<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function users() {
    return $this->hasMany(User::class);
    }

    public function parent() {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Account::class, 'parent_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendingAccounts extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'id');
    }
}

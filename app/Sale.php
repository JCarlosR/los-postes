<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use softDeletes;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

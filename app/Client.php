<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use Notifiable;
    use softDeletes;

    public function getNameCompleteAttribute() // accessor role_name
    {
        return $this->name.' '.$this->last_name; // ?
    }

    public function getTypeNameAttribute() // accessor role_name
    {
        if ($this->type == 'N')
            return 'Natural';
        if ($this->type == 'J')
            return 'Jurídica';
    }
}

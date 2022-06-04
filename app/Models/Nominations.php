<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominations extends Model
{
    use HasFactory;

    public function event() {
        return $this->belongsTo(Events::class, 'id_event', 'id');
    }
}

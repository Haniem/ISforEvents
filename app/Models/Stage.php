<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    public function nomination() {
        return $this->belongsTo(Nominations::class, 'id_nomination', 'id');
    }
}

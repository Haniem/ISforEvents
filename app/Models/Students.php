<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'student_surname',
        'student_lastname',
        'course',
        'id_group',
    ];

    public function group() {
        return $this->belongsTo(Groups::class, 'id_group', 'id');
    }
}

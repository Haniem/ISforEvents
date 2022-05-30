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
        'group_name',
        'department',
    ];
}

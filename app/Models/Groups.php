<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'id_department',
        'id_specialization',
    ];

    public function department() {
        return $this->belongsTo(Departments::class, 'id_department', 'id');
    }

    public function specialization() {
        return $this->belongsTo(Specialization::class, 'id_specialization', 'id');
    }
}

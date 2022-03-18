<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    public function department() {
        return $this->belongsTo(Departments::class, 'department', 'department_name');
    }
}

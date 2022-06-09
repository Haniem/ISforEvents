<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    public function student() {
        return $this->belongsTo(Students::class, 'id_student', 'id');
    }

    public function result() {
        return $this->belongsTo(Results::class, 'id_result', 'id');
    }

    public function status() {
        return $this->belongsTo(Request_statuses::class, 'id_request_status', 'id');
    }

    public function stage() {
        return $this->belongsTo(Stage::class, 'id_stage', 'id');
    }
}

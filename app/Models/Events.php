<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    public function type() {
        return $this->belongsTo(Event_types::class, 'id_event_type');
    }

    public function status() {
        return $this->belongsTo(Event_statuses::class, 'id_event_status');
    }

    public function level() {
        return $this->belongsTo(Event_levels::class, 'id_event_level');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}

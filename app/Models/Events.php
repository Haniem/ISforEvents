<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_discription',
        'event_format',
        'begin_date',
        'end_date',
        'event_age',
        'event_requirements',
        'event_link',
        'place_of_realization',
        'id_event_type',
        'id_event_level',
        'id_event_status',
        'id_user',
        'event_com',
    ];

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_id',
        'name',
        'instance',
        'address',
        'email',
        'phone',
        'reservation_date',
        'number_of_people',
        'status',
        'hour_start',
        'hour_end',
        'indoor_outdoor',
        'notes',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
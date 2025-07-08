<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',         // Optional: path gambar fasilitas
    ];

    /**
     * Relasi dengan pemesanan fasilitas
     */
    public function reservations()
    {
        return $this->hasMany(FacilityReservation::class);
    }
}

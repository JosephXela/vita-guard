<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    public function messages()
    {
        return $this->hasMany(ConsultationMessage::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    protected $fillable = [
        'booking_id',
        'status',
        'started_at',
        'ended_at',
        'summary'
    ];
}

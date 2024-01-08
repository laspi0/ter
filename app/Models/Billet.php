<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe',
        'tarif',
        'depart',
        'arrive',
        'heure_depart',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

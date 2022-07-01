<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_receive',
        'email_receive',
        'phone_receive',
        'time_start',
        'time_end',

        'price',
        'pitch_id'
    ];
    public function pitch()
    {
        return $this->belongsTo(Pitch::class);
    }
}

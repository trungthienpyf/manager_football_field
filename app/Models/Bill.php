<?php

namespace App\Models;

use App\Enums\BillStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_receive',
        'email_receive',
        'phone_receive',
        'date_receive',
        'time_id',
        'price',
        'pitch_id',
        'expected_time'
    ];

    public static function getKeyByValue($value)
    {
        return array_search($value, BillStatusEnum::getArrayView(), true);
    }

    public function pitch()
    {
        return $this->belongsTo(Pitch::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function getTimeDateStartAttribute()
    {
        return date('d-m-Y', strtotime($this->date_receive)) . ' - ' . $this->time->time_start;
    }

    public function getTimeDateEndAttribute()
    {
        return date('d-m-Y', strtotime($this->date_receive)) . ' - ' . $this->time->time_end;
    }

}

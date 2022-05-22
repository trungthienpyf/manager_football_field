<?php

namespace App\Models;

use App\Enums\PitchStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    use HasFactory;
    protected $fillable=['name','price','img','area_id','status','size','pitch_id'];
    public function Area()
    {
        return $this->belongsTo(Area::class);
    }


    public static function getKeyByValue($value)
    {
        return array_search($value, PitchStatusEnum::getArrayView(), true);
    }

    public function getViewSize()
    {
        return $this->size == '1' ? '7' :'11';
    }
}

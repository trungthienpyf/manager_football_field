<?php

namespace App\Models;

use App\Enums\PitchStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    use HasFactory;
    protected $fillable=['name','price','img','area_id','status','size','pitch_id'];



    public static function getKeyByValue($value)
    {
        return array_search($value, PitchStatusEnum::getArrayView(), true);
    }
    public function pitch()
    {
        return $this->hasMany(Pitch::class, 'pitch_id');
    }



    public function getViewSize()
    {
        return $this->size == '1' ? '7' :'11';
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

}

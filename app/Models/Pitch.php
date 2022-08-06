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



    public function pitches()
    {
        return $this->hasMany(Pitch::class, 'pitch_id');
    }
    public function pitch()
    {
        return $this->belongsTo(Pitch::class, 'pitch_id','id');
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }


    public function getNameSizeAttribute()
    {
        return $this->size == '1' ? '7' :'11';
    }
//    public function getNameOfSizeAttribute($param)
//    {
//        $nameOfParents =Pitch::query()
//            ->select('name')
//            ->where('id','=',$param)
//            ->first();
//        return $nameOfParents ;
//    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function getPriceVietNamAttribute(){
        return number_format($this->price, 0, '', ',');
    }
}

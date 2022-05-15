<?php

namespace App\Models;

use App\Enums\FootBallFieldStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootBallField extends Model
{
    use HasFactory;
    protected $fillable=['name','price','img','area_id','status','category_id'];
    public function Area()
    {
        return $this->belongsTo(Area::class);
    }
    public function Category()
    {
        return $this->belongsTo(CategoryPeople::class);
    }

    public static function getKeyByValue($value)
    {
        return array_search($value, FootBallFieldStatusEnum::getArrayView(), true);
    }
}

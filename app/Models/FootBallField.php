<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootBallField extends Model
{
    use HasFactory;
    protected $fillable=['name','price','img',];
    public function Area()
    {
        return $this->belongsTo(Area::class);
    }
}

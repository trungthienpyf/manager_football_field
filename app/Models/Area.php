<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
//    use SoftDeletes;
    protected $fillable=['name'];
    public function pitches()
    {
        return $this->hasMany(Pitch::class);
    }
}

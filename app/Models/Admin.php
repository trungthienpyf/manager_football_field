<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{

    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
    ];
    public function bills(){
         return   $this->hasMany(Bill::class);
    }

}

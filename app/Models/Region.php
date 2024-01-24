<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';


    public function user()
    {
        //UserモデルのUserクラス
        return $this->hasMany(User::class);
    }
}

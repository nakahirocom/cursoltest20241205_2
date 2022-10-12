<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santaku extends Model
{
    use HasFactory;

    protected $table = 'questions';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

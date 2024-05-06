<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mymemo extends Model
{
    use HasFactory;
    protected $table = 'mymemos';


    public function user()
    {
        //UserモデルのUserクラス
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        //QuestionモデルのQuestionクラス
        return $this->belongsTo(Question::class);
    }
}

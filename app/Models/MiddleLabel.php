<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiddleLabel extends Model
{
    use HasFactory;
    protected $table = 'middle_labels';


    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function answerResult()
    {
        return $this->hasMany(AnswerResults::class);
    }

    public function largeLabel()
    {
        return $this->hasMany(LargeLabel::class);
    }



    public function labelStrages()
    {
        return $this->hasMany(LabelStorages::class);
    }
}

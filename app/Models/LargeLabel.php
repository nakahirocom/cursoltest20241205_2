<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LargeLabel extends Model
{
    use HasFactory;
    protected $table = 'large_labels';


    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function answerResult()
    {
        return $this->hasMany(AnswerResults::class);
    }

    public function labelStrages()
    {
        return $this->hasMany(LabelStorages::class);
    }
}

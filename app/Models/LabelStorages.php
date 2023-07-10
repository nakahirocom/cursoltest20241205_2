<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelStorages extends Model
{
    use HasFactory;
    protected $table = 'label_storages';

    public function MiddleLabel()
    {
        return $this->belongsTo(MiddleLabel::class);
    }

    public function largeLabel()
    {
        return $this->belongsTo(LargeLabel::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

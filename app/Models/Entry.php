<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}

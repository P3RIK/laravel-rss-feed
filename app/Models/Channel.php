<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['link', 'name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}

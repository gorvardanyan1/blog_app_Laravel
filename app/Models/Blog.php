<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description']; // Add 'title' to the fillable array

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

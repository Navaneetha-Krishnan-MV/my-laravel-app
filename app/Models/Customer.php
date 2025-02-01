<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Ensure the columns are in $fillable
    protected $fillable = ['name', 'email']; 

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

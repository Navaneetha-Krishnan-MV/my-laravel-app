<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // Use the trait
    
    protected $fillable = ['name', 'qty', 'price', 'description'];
}

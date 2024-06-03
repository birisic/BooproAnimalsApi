<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'weight', 'created_at', 'updated_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

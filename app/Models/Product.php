<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function lot() {
        return $this->hasMany(Lot::class);
    }
    public function product_log() {
        return $this->hasMany(Log::class);
    }
}

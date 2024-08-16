<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','quantity','product_id'
    ];
    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function lot_log() {
        return $this->hasMany(Log::class);
    }
}

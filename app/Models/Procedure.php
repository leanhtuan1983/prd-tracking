<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
    protected $table = 'procedures';
    protected $fillable = [
        'name'
    ];
    public function processes() {
        return $this->hasMany(Process::class);
    }
    public function procedure_log() {
        return $this->hasMany(Log::class);
    }
}

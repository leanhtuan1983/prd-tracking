<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
        'name','target'
    ];
    public function process() {
        return $this -> hasMany(Process::class); 
    }
    public function dept_log() {
        return $this -> hasMany(Log::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;
    protected $table = 'processes';
    protected $fillable = [
        'name', 'procedure_id','dept_id'
    ];
    public function department() {
        return $this->belongsTo(Procedure::class,'procedure_id','id');
    }
    public function departments() {
        return $this->belongsTo(Department::class,'dept_id','id');
    }
    public function process_log() {
        return $this->hasMany(Log::class,'process_id','id');
    }
}

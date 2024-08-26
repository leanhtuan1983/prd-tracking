<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Working_time extends Model
{
    use HasFactory;
    protected $table = 'working_times';
    protected $fillable = [
        'start_time','end_time'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $fillable = [
        'name','lot_id','product_id','procedure_id','process_id','dept_id','status_id'
    ];
    public function logs_lot() {
        return $this->belongsTo(Lot::class,'lot_id','id');
    }
    public function logs_product() {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function logs_procedure() {
        return $this->belongsTo(Procedure::class,'procedure_id','id');
    }
    public function logs_process() {
        return $this->belongsTo(Process::class,'process_id','id');
    }
    public function logs_department() {
        return $this->belongsTo(Department::class,'dept_id','id');
    }
    public function logs_status() {
        return $this->belongsTo(Status::class,'status_id','id');
    }
}

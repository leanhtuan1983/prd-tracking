<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Log;
use Illuminate\Http\Request;

class FeController extends Controller
{
    //
    public function index() {
        $logs = Log::select('lot_id','name','product_id','procedure_id')
        ->groupBy('lot_id','name','product_id','procedure_id')->get();
        $subMenus = Department::all();
        return view('fe.index', compact('logs','subMenus'));
    }
    public function show($lot_id) {
        $data = Log::where('lot_id',$lot_id)->get();
        return view('fe.show', compact('data'));
    }
   public function showDept($dept_id) {
    $deptData = Log::where('dept_id',$dept_id)->get(); 
    return view('fe.dept.show',compact('deptData'));
   }
   public function update($id) {
    $record = Log::find($id);
    if ($record && $record->status_id < 3) {
        $record->status_id += 1;
        $record->save();
        }
    return redirect()->back();
    }
}

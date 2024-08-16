<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Log;
use Illuminate\Http\Request;

class FeController extends Controller
{
    //
    public function index() {
        // Index tất cả các product và procedure được input 
        $logs = Log::select('lot_id','name','product_id','procedure_id')
        ->groupBy('lot_id','name','product_id','procedure_id')->get();

        // List danh sách các department theo dạng menu
        $subMenus = Department::all();
        return view('fe.index', compact('logs','subMenus'));
    }
    public function show($lot_id) {
        // Index các chi tiết của product bao gồm process, department, status
        $data = Log::where('lot_id',$lot_id)->get();
        $totalData = Log::where('lot_id',$lot_id)->count();
        $completeData = Log::where('lot_id',$lot_id)->where('status_id','3')->count();
        return view('fe.show', compact('data','totalData','completeData'));
    }
   public function showDept($dept_id) {
        // Index các product và status của 1 product tại 1 department 
        $deptData = Log::where('dept_id',$dept_id)->get();
        return view('fe.dept.show',compact('deptData'));
   }
   public function update($id) {
        // Cập nhật tạng thái mới của product tại department 
        $record = Log::find($id);
            if ($record && $record->status_id < 3) {
                $record->status_id += 1;
                $record->save();
                }
    return redirect()->back();
    }
}

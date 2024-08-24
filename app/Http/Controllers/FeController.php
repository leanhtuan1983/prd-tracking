<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Lot;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeController extends Controller
{
    //
    public function index() {
        // Index tất cả các product và procedure được input 
        $logs = Log::select('lot_id','name','product_id','procedure_id',DB::raw('AVG(status_id) as status'))
        ->groupBy('lot_id','name','product_id','procedure_id')
        ->orderBy('created_at','desc')->get();       
        // List danh sách các department theo dạng menu ở index
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
        // Index các product và status của product input tại 1 department 
        $deptData = Log::where('dept_id',$dept_id)->get();
        
        // Tính tổng các lot hàng đã hoàn thành tại department
        $completedLot = DB::table('logs')
        ->select('quantity')
        ->where('dept_id',$dept_id)
        ->groupBy('lot_id','quantity')
        ->havingRaw('AVG(status_id) = ?', [3])
        ->sum('quantity');
        // dd($completedLotID);
      
        // $deptProductivity =  Log::where('dept_id',$dept_id)
        //                     ->where('status_id','3')
        //                     ->count('quantity');                                                
                  
         // List danh sách các department theo dạng menu ở mỗi dept
         $subMenu = Department::all();
        
        return view('fe.dept.show',compact('deptData','subMenu','completedLot'));
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

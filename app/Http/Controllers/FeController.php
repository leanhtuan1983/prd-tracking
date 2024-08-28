<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Lot;
use App\Models\Department;
use App\Models\Working_time;
use Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeController extends Controller
{
    //
    public function index() {
        // List danh sách các department theo dạng menu ở index
        $subMenus = Department::all();

        // Index tất cả các product và procedure được input 
        $logs = Log::select('lot_id','name','product_id','procedure_id',DB::raw('AVG(status_id) as status'))
        ->groupBy('lot_id','name','product_id','procedure_id')
        ->orderBy('created_at','desc')->get();
        
        return view('fe.index', compact('logs','subMenus'));
    }
    public function show($lot_id) {
        // Index các chi tiết của lot được input gần nhất bao gồm tên lot, product, process, department, status 
        $data = Log::where('lot_id',$lot_id)->get();
        $totalData = Log::where('lot_id',$lot_id)->count();
        $completeData = Log::where('lot_id',$lot_id)->where('status_id','3')->count();

        return view('fe.show', compact('data','totalData','completeData'));
    }
   public function showDept($dept_id) {
        // List danh sách các department theo dạng menu ở mỗi dept
         $subMenu = Department::all();

        // Index các lot và status được input gần nhất tại department được chọn 
        $deptData = Log::where('dept_id',$dept_id)->orderBy('created_at','desc')->get();
        
        // Lấy thời gian bắt đầu và kêt thúc công việc trong ngày để tính sản lượng
        $workingTime = Working_time::first();
        $startTime = $workingTime->start_time;
        $endTime = $workingTime->end_time;
  
        // Tính tổng các lot hàng đã hoàn thành tại department trong ngày (tất cả các process của 1 lot hàng đạt trạng thái hoàn thành mới được tính)
        $completedLot = DB::table('logs')
        ->select('quantity')
        ->whereTime('updated_at', '>=', $startTime)
        ->whereTime('updated_at', '<=', $endTime)
        ->whereDate('updated_at', Carbon::today())
        ->where('dept_id',$dept_id)
        ->groupBy('lot_id','quantity')
        ->havingRaw('AVG(status_id) = ?', [3])
        ->sum('quantity'); 

        // Lấy số thời gian đã làm việc trong ngày để tính năng suất thực tế theo giờ
        $currentTime = Carbon::now();
        $workedHours = $currentTime->diffInHours($startTime);
        if($workedHours <= 1) {
        $efficiency = round($completedLot/$workedHours);
        } else {
            $efficiency = 0;
        }
         
        // Lấy tổng thời gian làm việc của 1 ngày và tính toán sản lượng dự kiến
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);
        $totalMinutes = $end->diffInMinutes($start);
        $totalTime = $totalMinutes/60;
        $estimatedOutput = round($efficiency*$totalTime);

        // Lấy target của dept
        $target = Department::where('id',$dept_id)->value('target'); 

        // Tính công suất
        $capacity = round($efficiency/($target/$totalTime)*100);

        return view('fe.dept.show',compact('deptData','subMenu','completedLot','efficiency','target','estimatedOutput','capacity'));
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

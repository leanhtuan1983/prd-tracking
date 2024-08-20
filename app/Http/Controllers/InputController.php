<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Lot;
use App\Models\Process;
use App\Models\Product;
use App\Models\Procedure;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index() {
        $logs = Log::with(['logs_lot','logs_product','logs_procedure','logs_process','logs_department','logs_status'])->get();
        $procedures = Procedure::all();
        return view('trackings.index', compact('logs','procedures'));
    } 
    public function store(Request $request) {
        $inputLot = $request->input('name'); // Nhập tên lot hàng
        $inputProcedure = $request->input('procedure_id'); // Lựa chọn phương thức
        $checkLot = Lot::where('name',$inputLot)->first(); // Kiếm tra lot hàng trong Database hay không
        
        //  Nếu tồn tại lot hàng trong Database
        if($checkLot) {
            $lotId=$checkLot->id; // Tìm id lot hàng
            $quantity = $checkLot->quantity; // Tìm số lượng lot hàng
            $productId = $checkLot->product_id; // Tìm id sản phẩm
            $procedureId = Procedure::where('id',$inputProcedure)->first(); // Tìm id quy trình
            // $processIds = Process::where('procedure_id',$procedureId)->get('id');
            // $deptIds = Process::where('id',$procedureId)->pluck('dept_id');        
            $processIds = $procedureId -> processes;
             foreach($processIds as $processId) {
                $newLog = new Log();
                $newLog -> name = $checkLot -> name;
                $newLog -> lot_id = $lotId;
                $newLog -> quantity = $quantity;
                $newLog -> product_id = $productId;
                $newLog -> procedure_id = $procedureId->id;               
                $newLog -> process_id = $processId->id;
                $newLog -> dept_id = $processId->dept_id;
                $newLog->save();
             }
             return redirect()->route('tracking.index')->with('success','New Data Added Successfully!');
                                
        }
        else {
            return redirect()->route('tracking.index')->with('error','No Data Found');
        }
    }
}


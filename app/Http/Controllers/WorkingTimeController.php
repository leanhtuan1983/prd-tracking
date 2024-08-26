<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Working_time;

class WorkingTimeController extends Controller
{
    public function index() {
        $workingTimes = Working_time::all();
        return view('working_times.index',compact('workingTimes'));
    }
    public function update(Request $request, $id) {
         // Validate dữ liệu đầu vào
        $request->validate([
            'start_time' => 'required|date_format:H:i', // Định dạng giờ 'HH:mm'
            'end_time' => 'required|date_format:H:i', // Định dạng giờ 'HH:mm'
            ]);

        // Tìm id
        $workingTimes = Working_time::findOrFail($id);
        $workingTimes->start_time = $request->input('start_time');
        $workingTimes->end_time = $request->input('end_time');
        $workingTimes->save();
        return redirect()->route('working_time.index')->with('success', 'Setting successfully!');
    }
}

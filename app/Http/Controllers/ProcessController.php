<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Procedure;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index() {
        $processes = Process::with(['department','departments'])->get();
        // dd($processes);
        return view('processes.index', compact('processes'));
    }
    public function create() {
        $procedures = Procedure::all();
        $departments = Department::all();
        return view('processes.create', compact('procedures','departments'));
    }
    public function store(Request $request) {
        $request->validate([
            'name'=> 'required|string|max:255',
            'procedure_id' =>'required|exists:procedures,id',
            'dept_id'=> 'required|exists:departments,id'
        ]);
        Process::create($request->all());
        return redirect()->route('processes.index')->with('success','Process create successfully!');
    }
    public function edit(Process $process) {
        $procedures = Procedure::all();
        $departments = Department::all();
        return view('processes.edit', compact('process','procedures','departments'));
    }
    public function update(Request $request, Process $process) {
        $request->validate([
            'name' => 'required|string|max:255',
            'procedure_id' => 'required|exists:procedures,id',
            'dept_id' => 'required|exists:departments,id'
        ]);
        $process->update($request->all());
        return redirect()->route('processes.index')->with('success','Process updated successfully!');
    }
    public function destroy(Process $process) {
        $process->delete();
        return redirect()->route('processes.index')->with('success','Process deleted successfully!');
    }
}

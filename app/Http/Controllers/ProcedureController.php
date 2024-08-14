<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index() {
        $procedures = Procedure::all();
        return view('procedures.index', compact('procedures'));
    } 
    public function create() {
        return view('procedures.create');
    }
    public function store(Request $request) {
        $request->validate(['name'=>'required|string|max:255']);
        Procedure::create($request->all());
        return redirect()->route('procedures.index')->with('success','Procedure created successfully!');
    }
    public function edit(Procedure $procedure) {
        return view('procedures.edit', compact('procedure'));
    }
    public function update(Request $request, Procedure $procedure) {
        $request->validate(['name'=> 'required|string|max:255']);
        $procedure->update($request->all());
        return redirect()->route('procedures.index')->with('success', 'Procedure updated successfully!');
    }
    public function destroy(Procedure $procedure) {
        $procedure->delete();
        return redirect()->route('procedures.index')->with('success','Procedure deleted successfully!');
    }
}

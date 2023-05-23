<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables=Table::all();
        return view('admin.table.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {
       $tables= Table::create([
            'name'=>$request->name,
            'guest_number'=>$request->guest_number,
            'status'=>$request->status,
            'location'=>$request->location,
        ]);

        return to_route('admin.table.index',compact('tables'))->with('success','Table Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tables= Table::findorFail($id);
        return view('admin.table.edit',compact('tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'guest_number'=>'required',
            'status'=>['required'],
            'location'=>['required'],
        ]);

        $tables = Table::find($id);
        $tables->update([
            'name'=>$request->name,
            'guest_number'=>$request->guest_number,
            'status'=>$request->status,
            'location'=>$request->location,
        ]);
        return to_route('admin.table.index')->with('success','Table Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tables = Table::findorFail($id);
        $tables->delete();
        return to_route('admin.table.index')->with('danger','Table Deleted Successfully');
    }
}
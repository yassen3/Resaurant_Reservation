<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status',TableStatus::Available)->get();
        return view('admin.reservation.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number)
        {
            return back()->with('warning',"Please Choose The Table Based On Guest Number.");
        }


       $reservations= Reservation::create($request->validated());
        return to_route('admin.reservation.index',compact('reservations'))->with('success','Reservation Added Successfully');
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
        $tables = Table::where('status',TableStatus::Available)->get();

        $reservations = Reservation::findorFail($id);
        return view('admin.reservation.edit',compact('reservations','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number)
        {
            return back()->with('warning',"Please Choose The Table Based On Guest Number.");
        }
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'res_date'=>'required',
            'tel_number'=>'required',
            'table_id'=>'required',
            'guest_number'=>'required',
        ]);

        $reservations = Reservation::findorFail($id);
        $reservations->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'guest_number'=>$request->guest_number,
            'res_date'=>$request->res_date,
            'tel_number'=>$request->tel_number,
            'table_id'=>$request->table_id,

        ]);
        return to_route('admin.reservation.index')->with('success','Reservation Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $reservation =Reservation::findorFail($id);
       $reservation->delete();
       return to_route('admin.reservation.index')->with('danger','Reservation Deleted Successfully');
    }
}
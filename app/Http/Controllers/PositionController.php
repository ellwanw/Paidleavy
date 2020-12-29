<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return view('admin.position.index' , compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        alert()->success('Success','Position have been created!');

        request()->validate([
            'position_id' => 'required',
            'name' => 'required',
        ]);

        Position::create($request->all());
                return redirect('admin/position');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('admin.position.edit',compact('position'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {

        request()->validate([
            'position_id' => 'required',
            'name' => 'required',
        ]);

        Position::where('position_id',$position->position_id)->update([
            'position_id' => $request->position_id,
            'name' => $request->name,
        
        ]);
        alert()->success('Success','Position have been updated!');
        return redirect('admin/position');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        alert()->success('Success','Position have been deleted!');

        Position::destroy($position->id);
        return redirect('admin/position');
    }
}

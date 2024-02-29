<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone; 
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $zones = Zone::latest()->get();
        return view('zone.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('zone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities',
        ]);

        $zone = new Zone();
        $zone->name = $request->name;
        $zone->description = $request->description;
        $store = $zone->save();
        if ($store){
            return redirect(route('zones.index'))->with('success', 'Zone create successfully');
        }
        return back()->with('warning', 'Zone could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        return view('zone.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $zone)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $zone = Zone::find($zone);
        $zone->name = $request->name;
        $zone->description = $request->description;
        $store = $zone->update();
        if ($store){
            return redirect(route('zones.index'))->with('success', 'Zone update successfully');
        }
        return back()->with('warning', 'Zone could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        if ($zone->delete()){
            return back()->with('success', 'Zone delete successfully');
        }
        return back()->with('warning', 'Zone could not be delete');
    }
}

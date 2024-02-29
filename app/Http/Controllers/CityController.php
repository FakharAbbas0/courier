<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class CityController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cities = City::latest()->get();
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $zones = Zone::all();
        return view('city.create',compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities',
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->zone_id = $request->zone_id;
        $city->tax = $request->tax;
        $store = $city->save();
        if ($store){
            return redirect(route('city.index'))->with('success', 'City create successfully');
        }
        return back()->with('warning', 'City could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Response
     */
    public function edit(City $city)
    {
        $zones = Zone::all();
        return view('city.edit', compact('city','zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param City $city
     * @return void
     */
    public function update(Request $request, $city)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,'. $city,
        ]);
        $city = City::find($city);
        $city->name = $request->name;
        $city->zone_id = $request->zone_id;
        $city->tax = $request->tax;
        $store = $city->update();
        if ($store){
            return redirect(route('city.index'))->with('success', 'Class update successfully');
        }
        return back()->with('warning', 'Class could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return Response
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        if ($city->delete()){
            return back()->with('success', 'Class delete successfully');
        }
        return back()->with('warning', 'Class could not be delete');
    }
}

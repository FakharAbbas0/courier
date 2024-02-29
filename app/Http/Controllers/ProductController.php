<?php

namespace App\Http\Controllers;

use App\Models\City;
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
        $cities = AllCities::latest()->get();
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('city.create');
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

        $city = new AllCities();
        $city->name = $request->name;
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
     * @param AllCities $city
     * @return Response
     */
    public function edit(AllCities $city)
    {
        return view('city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AllCities $city
     * @return void
     */
    public function update(Request $request, $city)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,'. $city,
        ]);
        $city = AllCities::find($city);
        $city->name = $request->name;
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
     * @param AllCities $city
     * @return Response
     * @throws \Exception
     */
    public function destroy(AllCities $city)
    {
        if ($city->delete()){
            return back()->with('success', 'Class delete successfully');
        }
        return back()->with('warning', 'Class could not be delete');
    }
}

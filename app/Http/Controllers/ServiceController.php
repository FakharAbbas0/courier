<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType; 
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = ServiceType::latest()->get();
        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('service.create');
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
            'service_type' => 'required|unique:cities',
        ]);

        $service = new ServiceType();
        $service->service_type = $request->service_type;
        $service->description = $request->description;
        $store = $service->save();
        if ($store){
            return redirect(route('services.index'))->with('success', 'Service create successfully');
        }
        return back()->with('warning', 'Service could not be create');
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
    public function edit(ServiceType $service)
    {
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service)
    {
        $request->validate([
            'service_type' => 'required',
        ]);
        $service = ServiceType::find($service);
        $service->service_type = $request->service_type;
        $service->description = $request->description;
        $store = $service->update();
        if ($store){
            return redirect(route('services.index'))->with('success', 'Service update successfully');
        }
        return back()->with('warning', 'Service could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceType $service)
    {
        if ($service->delete()){
            return back()->with('success', 'Service delete successfully');
        }
        return back()->with('warning', 'Service could not be delete');
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slab; 
use App\SlabInfo;
use App\SlabOrigin;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
class SlabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slabs = Slab::latest()->get();
        return view('slab.index', compact('slabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('slab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slab = new Slab();
        $slab->slab_name = $request->slab_name;
        $slab->slab_type = $request->slab_type;
        $slab->service_id = $request->service_id;
        $slab->division_factor = $request->division_factor;
        $slab->product_id = 1;
        $store = $slab->save();
        if ($store){
            $slab_id = $slab->id;
            $weight_froms = $request->weight_from;
            foreach($weight_froms as $key => $weight_from){
                $slab_info = new SlabInfo();
                $slab_info->slab_id = $slab_id;
                $slab_info->weight_from = $weight_from;
                $slab_info->weight_to = $request->weight_to[$key];
                $slab_info->amount = $request->amount[$key];
                $slab_info->is_last = $request->is_last[$key];
                $slab_info->save();
                
            }
            if(isset($request->slab_origin) AND !empty($request->slab_origin)){
                foreach ($request->slab_origin as $skey => $slaborigin) {
                    # code...
                    $slabOrigin = new SlabOrigin();
                    $slabOrigin->slab_origin = $slaborigin;
                    $slabOrigin->slab_destination = $request->slab_origin[$skey];
                    $slabOrigin->slab_id = $slab_id; 
                    $slabOrigin->slab_type = $request->slab_type; 
                    $slabOrigin->save();
                }
            }
            return redirect(route('slab.index'))->with('success', 'Slab create successfully');
        }
        return back()->with('warning', 'Slab could not be create');
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
    public function edit(Slab $service)
    {
        return view('slab.edit', compact('service'));
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
        $service = Slab::find($service);
        $service->service_type = $request->service_type;
        $service->description = $request->description;
        $store = $service->update();
        if ($store){
            return redirect(route('slab.index'))->with('success', 'Slab update successfully');
        }
        return back()->with('warning', 'Slab could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slab $service)
    {
        if ($service->delete()){
            return back()->with('success', 'Slab delete successfully');
        }
        return back()->with('warning', 'Slab could not be delete');
    }
}

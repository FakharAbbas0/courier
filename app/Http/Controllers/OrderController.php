<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use App\Models\Order;
use App\Models\ServiceType;
use App\Models\OrderInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    function __construct()
    {
        // $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = [];
        // $orders = Order::with('orderInfo','originCity','destinationCity','orderStatus')->get();
        // dd($orders);
        // die;
        return view('order.index', compact('orders'));
    }
    public function report()
    {
        $orders = [];
        // $orders = Order::with('orderInfo','originCity','destinationCity','orderStatus')->get();
        // dd($orders);
        // die;
        return view('order.index', compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['customers'] = Customer::all();
        $data['services'] = ServiceType::all();
        $data['cities'] = City::all();
        
        return view('order.create',$data);
    }
    public function AddUpdate(Request $request){
        
        $order_id = isset($request->order_id) ? $request->order_id : 0;
        if($order_id > 0){
            $order = Order::find($order_id);
            $order_info = OrderInfo::where('order_id',$order_id)->first();
            
        }else{
            $order = new Order();
            $order_info = new OrderInfo();
        }
        $order->customer_id = $request->customer_id;
        $order->service_id = $request->service_id;
        $order->order_date = date('Y-m-d',strtotime(str_replace('/', '-',$request->order_date)))." ".date(" H:i:s");
        $order->origin = $request->origin;
        $order->destination = $request->destination;
        $order->cod_amount = $request->cod_amount;
        $order->delivery_charges = $request->delivery_charges;
        $order->fuel_surcharge = $request->fuel_surcharge;
        $order->sale_tax = $request->sale_tax;
        $order->net_amount = $request->net_amount;
        $order->save();
        $order_info->semail = $request->semail;
        $order_info->sphone = $request->sphone;
        $order_info->sender_address = $request->saddress;
        $order_info->sname = $request->sname;
        $order_info->rname = $request->rname;
        $order_info->remail = $request->remail;
        $order_info->rphone = $request->rphone;
        $order_info->receiver_address = $request->raddress;
        $order_info->description = $request->description;
        $order_info->order_info = $request->order_info;
        $order_info->comments = $request->comments;
        $order_info->save();
        if($order_id > 0){
            return redirect(route('orders.index'))->with('success', 'Order Updated successfully');
        }else{
            $tracking_no  = 6000000+$order->id;
            $order->tracking_no = $tracking_no;
            $order->save();
            $parent_order_id = $order->id;
            $order_info->order_id = $parent_order_id;
            $order_info->tracking_no = $tracking_no;
            $order_info->save();
            addTracking($order->id,1,1);
            return redirect(route('orders.index'))->with('success', 'Order created successfully');
        }
        return redirect(route('orders.index'))->with('warning', 'Error Occured Try again');
    }

    public function store(Request $request)
    {
        $order  = new Order();
        $order->customer_id = $request->customer_di;
        $store = $order->save();
        if ($store){
            $order->tracking_no = 6000000+$order->id;
            $order->save();
            
        }
        return redirect(route('orders.index'))->with('warning', 'Order could not be create');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $data['customers'] = Customer::all();
        $data['services'] = ServiceType::all();
        $data['cities'] = City::all();
        $data['order'] = Order::with('orderInfo')->find($id);
        // dd($data['order']);
        return view('order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ParentUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $update = false;
        if ($update){
            return redirect(route('parents.index'))->with('success', 'Parent update successfully');
        }
        return back()->with('warning', 'Parent could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AllParent $parent
     * @return Response
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        if ($order->delete()){
            return back()->with('success', 'Order delete successfully');
        }
        return back()->with('warning', 'Order could not be delete');
    }

}

@extends('layouts.master')

@section('content')

    

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">

                        <form method="POST" action="{{ route('orders.update') }}" class="form-horizontal">
                            
                            @csrf()
                            <input type="hidden" value="{{$order->id}}" name="order_id">
                            
                            @include('order.element')

                            <div class="form-group">
                                <div class=" col-lg-10">
                                    <a href="{{ route('parents.index') }}" class="btn btn-sm btn-warning t m-t-n-xs"><strong>Cancel</strong></a>
                                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                                        <strong>Submit</strong></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
    

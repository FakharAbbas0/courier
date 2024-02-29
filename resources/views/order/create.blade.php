@extends('layouts.master')

@section('content')

    {{-- <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Order</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('orders.index') }}">Order</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools">
                <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i
                            class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div> --}}

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins" >
                    {{-- <div class="ibox-title">
                        <h5>Create order</h5>
                    </div> --}}
                    <div class="ibox-content">

                        <form method="POST" action="{{ route('orders.update') }}" class="form-horizontal">
                            @csrf()

                            @include('order.element')

                            <div class="form-group">
                                <div class=" col-lg-12">
                                    <a href="{{ route('orders.index') }}" class="btn btn-sm btn-warning t m-t-n-xs"><strong>Cancel</strong></a>
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

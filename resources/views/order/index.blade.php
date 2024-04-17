@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Order</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('orders.index') }}">Order</a>
                </li>
                <li class="active">
                    <strong>Index</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools m-t-xl">
                <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        @include('partials.flash_messages.flashMessages')

        <div class="row">
            <div class="col-lg-12">
                <div class="card float-e-margins">
                    <div class="card-header">
                        <h5>Order</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Sender Info</th>
                                    <th>Receiver Info</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Delivery Charges</th>
                                    <th>Net Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($i=1)
                                @foreach ($orders as $item)
                                    
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ ucfirst($item->orderInfo->sname) }}</td>
                                        <td>{{ $item->orderInfo->rname }}</td>
                                        <td>{{ $item->originCity->name }}</td>
                                        <td>{{ $item->destinationCity->name }}</td>
                                        <td>{{ $item->delivery_charges }}</td>
                                        <td>{{ $item->net_amount }}</td>
                                        <td>
                                            <label class="badge badge-primary" style="background:{{$item->orderStatus->color}}">{{$item->orderStatus->name}}</label>
                                        </td>

                                        <td>
                                            <a title="Edit" href="{{ route('orders.edit', $item->id) }}" class="cus_mini_icon color-success"> <i class="bi bi-pencil-square"></i></a>
                                            <a title="Delete" data-toggle="modal" data-target="#myModal{{$item->id}}" type="button" class="cus_mini_icon color-danger"><i class="bi bi-trash-fill"></i></a>
                                        </td>

                                        <!-- The Modal -->
                                        <div class="modal fade in" id="myModal{{$item->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete parent</h4>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">

                                                        <h3>You are going to delete ' {{ $item->tracking_no }} ' ?</h3>

                                                        <a data-dismiss="modal" class="btn btn-sm btn-warning"><strong>No</strong></a>
                                                        <button class="btn btn-sm btn-primary" type="submit" onclick="event.preventDefault();
                                                            document.getElementById('class-delete-form{{ $item->id }}').submit();">
                                                            <strong>Yes</strong>
                                                        </button>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <form id="class-delete-form{{ $item->id }}" method="POST" action="{{ route('orders.destroy', $item->id) }}" style="display: none" >
                                            {{method_field('DELETE')}}
                                            @csrf()
                                        </form>

                                    </tr>

                                    @php($i++)
                                @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

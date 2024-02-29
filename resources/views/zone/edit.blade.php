@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Zone</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('zones.index') }}">Zone</a>
                </li>
                <li class="active">
                    <strong>Edit</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools">
                <div class="ibox-tools  m-t-xl">
                    <a href="{{ route('zones.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i
                            class="fa fa-plus"></i> <strong>Create</strong></a>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Zone</h5>
                    </div>
                    <div class="ibox-content">

                        <form method="POST" action="{{ route('zones.update', $zone->id) }}" class="form-horizontal">
                            {{ method_field('PUT') }}
                            @csrf()

                            @include('zone.element')

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <a href="{{ route('zones.index') }}" class="btn btn-sm btn-warning t m-t-n-xs"><strong>Cancel</strong></a>
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
    

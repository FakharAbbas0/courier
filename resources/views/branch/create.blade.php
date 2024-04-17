@extends('layouts.master')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Branch</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('branches.index') }}">Branch</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="ibox-tools  m-t-xl">
                <a href="{{ route('branches.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><i
                            class="fa fa-plus"></i> <strong>Create</strong></a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="card float-e-margins">
                    <div class="card-header">
                        <h5>Create Branch</h5>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('branches.store') }}" class="form-horizontal">
                            @csrf()

                            @include('branch.element')

                            <div class="form-group">
                                <div class="mt-3 col-lg-10 ">
                                    <a href="{{ route('branches.index') }}" class="btn btn-sm btn-warning t m-t-n-xs"><strong>Cancel</strong></a>
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

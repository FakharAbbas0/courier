@extends('layouts.master')
@section('content')
    <div class="pagetitle">
        <h1>Blank Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Blank</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Permissions</h5>
                        
                        <div class="container">
                            <form action="{{url('permissions')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" placeholder="Enter Permission name">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="submit" class="btn btn-success" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div> 
        </div>
    </section>
@endsection

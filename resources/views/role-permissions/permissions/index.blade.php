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
                        <a href="{{ url('permissions/create') }}" class="btn btn-primary mb-3 text-right">Create
                            Permission</a>
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Permission Name</th>
                                    <th style="width:15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $per)
                                    <tr>
                                        <td>{{ $per->id }}</td>
                                        <td>{{ $per->name }}</td>
                                        <td style="width:15%">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="{{ url('permissions/' . $per->id . '/edit') }}"
                                                        class="btn btn-primary">Edit</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <form action="{{ url('permissions/' . $per->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

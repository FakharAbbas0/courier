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
              <h5 class="card-title">Example Card</h5>
              <form method="POST" action="{{ url('orders') }}" class="form-horizontal">
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
    </section>
 
  @endsection


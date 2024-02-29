
@extends('layouts.master')
@section('content') 
    <div class="pagetitle">
      <h1>Add New Book Here</h1>
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
                  <h5 class="card-title">New Book</h5>
            
                  <!-- Vertical Form -->
                  <form class="row g-3" action="#">
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Book Name</label>
                      <input type="text" class="form-control" id="inputNanme4">
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- Vertical Form -->
            
                </div>
              </div>
          

        </div>
      </div>
    </section> 
  @endsection

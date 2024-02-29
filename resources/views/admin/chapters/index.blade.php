@extends('layouts.master')
@section('content')  

            <div class="pagetitle">
              <h1>All Books</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Books</li>
                  <li class="breadcrumb-item active">Data</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
        
            <section class="section">
              <div class="row">
                <div class="col-lg-12">
        
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Datatables</h5>
                       
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>
                              <b>N</b>ame
                            </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tbody>
                            @if (isset($allBooks))
                                @foreach ($allBooks as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>Edit | Delete</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        </tbody>
                      </table>
                      <!-- End Table with stripped rows -->
        
                    </div>
                  </div>
        
                </div>
              </div>
            </section> 
        
@endsection

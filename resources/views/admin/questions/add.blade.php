@extends('layouts.master')
@section('content')
   

        <div class="pagetitle">
            <h1>Add New Question</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Questions</li>
                    <li class="breadcrumb-item active">New</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Question</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" method="POST" action="{{route('questions.store')}}">
                                @csrf
                                {{-- First Row for Select Options --}}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <label for="book_id" class="form-label">Select Book</label>
                                                <select name="book_id" class="form-control" id="book_id" required>
                                                    <option value="">Select</option>
                                                    @foreach ($books as $bok)
                                                    <option value="{{$bok->id}}">{{$bok->name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6  col-md-6 col-sm-12">
                                                <label for="book_id" class="form-label">Select Subject</label>
                                                <select name="sub_id" class="form-control" id="sub_id" required>
                                                    <option value="">Select</option>
                                                    @foreach ($subjects as $sub)
                                                    <option value="{{$sub->id}}">{{$sub->name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mt-3 col-md-6 col-sm-12">
                                                <label for="book_id" class="form-label">Select Lesson</label>
                                                <select name="chapter_id" class="form-control" id="book_id" required>
                                                    <option value="">Select</option>
                                                    <option value="999">All</option>
                                                    @foreach ($chapters as $ch)
                                                    <option value="{{$ch->id}}">{{$ch->name}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mt-3 col-md-6 col-sm-12">
                                                <label for="book_id" class="form-label">Question Type</label>
                                                <select name="question_type" class="form-control" id="add_question_type"> 
                                                    <option value="1">MCQ'S</option>
                                                    <option value="2">True/False</option>
                                                    <option value="3">Short Question</option>
                                                    <option value="4">Long Question</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mt-3 col-md-6 col-sm-12">
                                                <label for="book_id" class="form-label">Syllbus</label>
                                                <select name="sylbus_id" class="form-control" id="sylbus_id"> 
                                                    <option value="1">PTB</option>
                                                    <option value="2">Oxford</option>
                                                    <option value="3">Afaq</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mt-3 col-md-6 col-sm-12">
                                                <label for="book_id" class="form-label">Difficulty</label>
                                                <select name="diffi" class="form-control" id="diffi"> 
                                                    <option value="1">Easy</option> 
                                                    <option value="2">Medium</option>
                                                    <option value="3">Hard</option> 
                                                    <option value="4">Expert</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="col-12 mb-3">
                                            <label for="input_1" class="form-label">Question</label>
                                            <input type="text" name="question" class="form-control" id="input_1"
                                                placeholder="Question Details" required>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="answer_one" required class="form-control mb-2" placeholder="Option A">
                                            <input type="text" name="answer_two" required class="form-control mb-2" placeholder="Option B">
                                            <input type="text" name="answer_three" required class="form-control mb-2" placeholder="Option C">
                                            <input type="text" name="answer_four" required class="form-control mb-2" placeholder="Option D">
                                            <div id="inputContainer">
                                                <!-- Existing inputs will be added here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Second Row --}}
                                {{-- <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-primary"
                                                id="btnAdd_Input">Add Answer</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-danger"
                                                id="btnRemove_input">Remove </button>
                                        </div>
                                    </div>
                                </div> --}}
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

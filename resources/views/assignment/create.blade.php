@extends('layouts.layout')

@section('content')
    <!-- Navbar -->

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="col-12">
            <div class="card my-3">
                <div class="card-header bg-transparent">
                    <div class=" ">
                        <div class="row pt-2">
                            <div class="col ps-4">
                                <h1 class="display-6 mb-3">
                                    <i class="bi bi-file-post"></i> Create Assignment
                                </h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{url()->previous()}}">My Courses</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create Assignment</li>
                                    </ol>
                                </nav>
                                @include('session-messages')

                                <div class="row mt-4">
                                    <div class="col-5">
                                        <div class="p-3 border bg-light shadow-sm">
                                            <form action="{{route('assignment.store')}}" method="POST"  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                                <input type="hidden" name="class_id" value="{{request()->query('class_id')}}">
                                                <input type="hidden" name="semester_id" value="{{request()->query('semester_id')}}">
                                                <input type="hidden" name="course_id" value="{{request()->query('course_id')}}">
                                                <input type="hidden" name="section_id" value="{{request()->query('section_id')}}">
                                                <div class="mb-3">
                                                    <label for="assignment-name" class="form-label">Assignment Name</label>
                                                    <input type="text" class="form-control" id="assignment-name" name="assignment_name" placeholder="Assignment Name" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="assignment-file" class="form-label">Assignment File</label>
                                                    <input type="file" name="file" class="form-control" id="assignment-file" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required>
                                                </div>
                                                <div class="mb-4">
                                                    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('layouts.footer')
                    </div>

                </div></div></div>



    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
    </div>
@endsection

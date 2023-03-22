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
                                <h1 class="display-6 mb-3"><i class="bi bi-journal-medical"></i> Edit Course</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{url()->previous()}}">Courses</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                                    </ol>
                                </nav>
                                @include('session-messages')
                                <div class="row">
                                    <form class="col-6" action="{{route('school.course.update')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <input type="hidden" name="course_id" value="{{$course_id}}">
                                        <div class="mb-3">
                                            <label for="course_name" class="form-label">Course Name</label>
                                            <input class="form-control" id="course_name" name="course_name" type="text" value="{{$course->course_name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="course_type" class="form-label">Course Type</label>
                                            <select class="form-select" id="course_type" name="course_type" aria-label="Course type">
                                                <option value="Core" {{($course->course_type == 'Core')? 'selected' : ''}}>Core</option>
                                                <option value="General" {{($course->course_type == 'General')? 'selected' : ''}}>General</option>
                                                <option value="Elective" {{($course->course_type == 'Elective')? 'selected' : ''}}>Elective</option>
                                                <option value="Optional" {{($course->course_type == 'Optional')? 'selected' : ''}}>Optional</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Save</button>
                                    </form>
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

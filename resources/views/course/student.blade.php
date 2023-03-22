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
                                    <i class="bi bi-journal-medical"></i> My Courses
                                </h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">My courses</li>
                                    </ol>
                                </nav>
                                <div class="mb-4 mt-4">
                                    <div class="p-3 mt-3 bg-white border shadow-sm">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($courses)
                                                    @foreach ($courses as $course)
                                                    <tr>
                                                        <td>{{$course->course_name}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <a href="{{route('course.mark.show', [
                                                                    'course_id' => $course->id,
                                                                    'course_name' => $course->course_name,
                                                                    'semester_id' => $course->semester_id,
                                                                    'class_id'  => $class_info->class_id,
                                                                    'session_id' => $course->session_id,
                                                                    'section_id' => $class_info->section_id,
                                                                    'student_id' => Auth::user()->id
                                                                    ])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-cloud-sun"></i> View Marks</a>
                                                                <a href="{{route('course.syllabus.index', ['course_id'  => $course->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-journal-text"></i> View Syllabus</a>
                                                                <a href="{{route('assignment.list.show', ['course_id' => $course->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-file-post"></i> View Assignments</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
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

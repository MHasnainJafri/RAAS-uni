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
                                    <i class="bi bi-file-text"></i> View Grading Systems
                                </h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View Grading Systems</li>
                                    </ol>
                                </nav>
                                <div class="mb-4 p-3 bg-white border shadow-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">System Name</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Semester</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($gradingSystems)
                                                @foreach ($gradingSystems as $gradingSystem)
                                                <tr>
                                                    <td>{{$gradingSystem->system_name}}</td>
                                                    <td>{{$gradingSystem->schoolClass->class_name}}</td>
                                                    <td>{{$gradingSystem->semester->semester_name}}</td>
                                                    <td>{{$gradingSystem->created_at}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{route('exam.grade.system.rule.create', ['grading_system_id' => $gradingSystem->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus"></i> Add Rule</a>
                                                            <a href="{{route('exam.grade.system.rule.show', ['grading_system_id' => $gradingSystem->id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View Rules</a>
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

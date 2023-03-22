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
                                    <i class="bi bi-person-lines-fill"></i> Promote Students
                                </h1>
                                @include('session-messages')
                                <p class="text-danger">
                                    <small><i class="bi bi-exclamation-diamond-fill me-2"></i> Students must be promoted only once to a new Session. Ususally, Admin will create a New Session once Academic activity ends for the Current Session.</small>
                                </p>
                                <div class="mb-4 mt-4">
                                    <form action="{{route('promotions.store')}}" method="POST">
                                        @csrf
                                        <table class="table mt-4">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#ID Card Number</th>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Previous Class</th>
                                                    <th scope="col">Previous Section</th>
                                                    <th scope="col">Promoting to Class</th>
                                                    <th scope="col">Promoting to Section</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($students)
                                                    @foreach ($students as $index => $student)
                                                    <tr>
                                                        <th scope="row">
                                                            <input type="text" class="form-control" name="id_card_number[{{$student->student->id}}]" value="{{$student->id_card_number}}">
                                                        </th>
                                                        <td>{{$student->student->first_name}}</td>
                                                        <td>{{$student->student->last_name}}</td>
                                                        <td>{{$schoolClass->class_name}}</td>
                                                        <td>{{$section->section_name}}</td>
                                                        <td>
                                                            <select onchange="getSections(this, {{$index}});" class="form-select form-select-sm" id="inputAssignToClass{{$index}}" name="class_id[{{$index}}]" required>
                                                                @isset($school_classes)
                                                                    <option selected disabled>Please select a class</option>
                                                                    @foreach ($school_classes as $school_class)
                                                                        <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                                    @endforeach
                                                                @endisset
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-select-sm" aria-label="Section" id="inputAssignToSection{{$index}}" name="section_id[{{$index}}]" required>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-outline-primary mb-3"><i class="bi bi-sort-numeric-up-alt"></i> Promote</button>
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

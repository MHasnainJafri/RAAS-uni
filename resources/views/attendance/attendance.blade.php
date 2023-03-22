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
                                    <i class="bi bi-calendar2-week"></i> View Attendance
                                </h1>

                                <h5><i class="bi bi-person"></i> Student Name: {{$student->first_name}} {{$student->last_name}}</h5>
                                <div class="row mt-3">
                                    <div class="col bg-white p-3 border shadow-sm">
                                        <div id="attendanceCalendar"></div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col bg-white border shadow-sm p-3">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Context</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendances as $attendance)
                                                    <tr>
                                                        <td>
                                                            @if ($attendance->status == "on")
                                                                <span class="badge bg-success">PRESENT</span>
                                                            @else
                                                                <span class="badge bg-danger">ABSENT</span>
                                                            @endif

                                                        </td>
                                                        <td>{{$attendance->created_at}}</td>
                                                        <td>{{($attendance->section == null)?$attendance->course->course_name:$attendance->section->section_name}}</td>
                                                    </tr>
                                                @endforeach
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

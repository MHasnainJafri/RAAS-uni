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
                                    <i class="bi bi-calendar2-week-fill"></i> View Attendance
                                </h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{url()->previous()}}">Courses</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View Attendance</li>
                                    </ol>
                                </nav>
                                @if(request()->query('course_name'))
                                    <h3><i class="bi bi-compass"></i> Course: {{request()->query('course_name')}} </h3>
                                @elseif(request()->query('section_name'))
                                    <h3><i class="bi bi-diagram-2"></i> Section: {{request()->query('section_name')}} </h3>
                                @endif
                                <div class="mt-4">Current Date and Time: {{ date('Y-m-d H:i:s') }}</div>
                                <div class="row mt-4">
                                    <div class="col bg-white border shadow-sm pt-2">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Student Name</th>
                                                    <th scope="col">Today's Status</th>
                                                    <th scope="col">Total Attended</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendances as $attendance)
                                                    @php
                                                        $total_attended = \App\Models\Attendance::where('student_id', $attendance->student_id)->where('session_id', $attendance->session_id)->count();
                                                    @endphp
                                                    <tr>
                                                        <td>{{$attendance->student->first_name}} {{$attendance->student->last_name}}</td>
                                                        <td>
                                                            @if ($attendance->status == "on")
                                                                <span class="badge bg-success">PRESENT</span>
                                                            @else
                                                                <span class="badge bg-danger">ABSENT</span>
                                                            @endif

                                                        </td>
                                                        <td>{{$total_attended}}</td>
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

@extends('layouts.layout')
<style>
    *{
        color:black;
    }
</style>
@section('content')
    <!-- Navbar -->

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            @isset($school_classes)
                @foreach ($school_classes as $school_class)
                    @php
                        $total_sections = 0;
                    @endphp
                    <div class="col-12">
                        <div class="card my-3">
                            <div class="card-header bg-transparent">
                                <ul class="nav nav-pills nav-fill p-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab"
                                            data-bs-target="#class{{ $school_class->id }}" role="tab" aria-current="true">
                                            {{ $school_class->class_name }}
                                        </a>
                                        {{-- <button class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" ><i class="bi bi-diagram-3"></i> {{$school_class->class_name}}</button> --}}
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab"
                                            data-bs-target="#class{{ $school_class->id }}-syllabus" role="tab"
                                            aria-current="false"> Syllabus</a>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link  mb-0 px-0 py-1" data-bs-toggle="tab"
                                            data-bs-target="#class{{ $school_class->id }}-courses" role="tab"
                                            aria-current="false"><i class="bi bi-journal-medical"></i> Courses</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body text-dark">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="class{{ $school_class->id }}" role="tabpanel">
                                        <div class="accordion" id="accordionClass{{ $school_class->id }}">
                                            @isset($school_sections)
                                                @foreach ($school_sections as $school_section)
                                                    @if ($school_section->class_id == $school_class->id)
                                                        @php
                                                            $total_sections++;
                                                        @endphp
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header"
                                                                id="headingClass{{ $school_class->id }}Section{{ $school_section->id }}">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#accordionClass{{ $school_class->id }}Section{{ $school_section->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="accordionClass{{ $school_class->id }}Section{{ $school_section->id }}">
                                                                    {{ $school_section->section_name }}
                                                                </button>
                                                            </h2>
                                                            <div id="accordionClass{{ $school_class->id }}Section{{ $school_section->id }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingClass{{ $school_class->id }}Section{{ $school_section->id }}"
                                                                data-bs-parent="#accordionClass{{ $school_class->id }}">
                                                                <div class="accordion-body">
                                                                    <p class="lead d-flex justify-content-between">
                                                                        <span>Room No: {{ $school_section->room_no }}</span>
                                                                        @can('edit sections')
                                                                            <span><a href="{{ route('section.edit', ['id' => $school_section->id]) }}"
                                                                                    role="button"
                                                                                    class="btn btn-sm btn-outline-primary"><i
                                                                                        class="bi bi-pencil"></i> Edit</a></span>
                                                                        @endcan
                                                                    </p>
                                                                    <div class="list-group">
                                                                        <a href="{{ route('student.list.show', ['class_id' => $school_class->id, 'section_id' => $school_section->id, 'section_name' => $school_section->section_name]) }}"
                                                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                                            View Students
                                                                        </a>
                                                                        <a href="{{ route('section.routine.show', ['class_id' => $school_class->id, 'section_id' => $school_section->id]) }}"
                                                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                                            View Routine
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="class{{ $school_class->id }}-syllabus" role="tabpanel">
                                        @isset($school_class->syllabi)
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Syllabus Name</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($school_class->syllabi as $syllabus)
                                                        <tr>
                                                            <td>{{ $syllabus->syllabus_name }}</td>
                                                            <td>
                                                                <div class="btn-group" role="group">
                                                                    <a href="{{ asset('storage/' . $syllabus->syllabus_file_path) }}"
                                                                        role="button" class="btn btn-sm btn-outline-primary"><i
                                                                            class="bi bi-download"></i> Download</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endisset
                                    </div>
                                    <div class="tab-pane fade" id="class{{ $school_class->id }}-courses" role="tabpanel">
                                        @isset($school_class->courses)
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Course Name</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($school_class->courses as $course)
                                                        <tr>
                                                            <td>{{ $course->course_name }}</td>
                                                            <td>{{ $course->course_type }}</td>
                                                            <td>
                                                                @can('edit courses')
                                                                    <a href="{{ route('course.edit', ['id' => $course->id]) }}"
                                                                        class="btn btn-sm btn-outline-primary" role="button"><i
                                                                            class="bi bi-pencil"></i> Edit</a>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent d-flex justify-content-between">
                                @isset($total_sections)
                                    <span>Total Sections: {{ $total_sections }}</span>
                                @endisset
                                @can('edit classes')
                                    <span><a href="{{ route('class.edit', ['id' => $school_class->id]) }}"
                                            class="btn btn-sm btn-outline-primary" role="button"><i class="bi bi-pencil"></i> Edit
                                            Class</a></span>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>


    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
    </div>
@endsection

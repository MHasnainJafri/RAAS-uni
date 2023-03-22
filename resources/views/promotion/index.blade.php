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
                                    <i class="bi bi-sort-numeric-up-alt"></i> Promote Class Section
                                </h1>
                                <h6>Filter list by:</h6>
                                <div class="mb-4 mt-4">
                                    <form action="{{route('promotions.index')}}" method="GET">
                                        <div class="row">
                                            <div class="col-3">
                                                <select class="form-select" name="class_id" required>
                                                    @isset($previousSessionClasses)
                                                        <option selected disabled>Please select a class</option>
                                                        @foreach ($previousSessionClasses as $school_class)
                                                        <option value="{{$school_class->schoolClass->id}}">{{$school_class->schoolClass->class_name}}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Load List</button>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">Section Name</th>
                                                <th scope="col">Promotion Status</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($previousSessionSections)
                                                @foreach ($previousSessionSections as $previousSessionSection)
                                                <tr>
                                                    <td>{{$previousSessionSection->section->section_name}}</td>
                                                    <td>{{($currentSessionSectionsCounts > 0)?'Promoted': 'Not Promoted'}}</td>
                                                    <td>
                                                        @if ($currentSessionSectionsCounts > 0)
                                                            No action needed
                                                        @else
                                                            <div class="btn-group" role="group">
                                                                <a href="{{route('promotions.create', ['previousSessionId' => $previousSessionId,'previous_section_id' => $previousSessionSection->section->id, 'previous_class_id' => $class_id])}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-sort-numeric-up-alt"></i> Promote</a>
                                                            </div>
                                                        @endif
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

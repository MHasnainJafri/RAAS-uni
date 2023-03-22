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
                                <h1 class="display-6 mb-3"><i class="bi bi-diagram-2"></i> Edit Section</h1>
                                @include('session-messages')
                                <div class="row">
                                    <form class="col-6" action="{{route('school.section.update')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <input type="hidden" name="section_id" value="{{$section_id}}">
                                        <div class="mb-3">
                                            <label for="section_name" class="form-label">Section Name</label>
                                            <input class="form-control" id="section_name" name="section_name" type="text" value="{{$section->section_name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="room_no" class="form-label">Room number</label>
                                            <input class="form-control" id="room_no" name="room_no" type="text" value="{{$section->room_no}}">
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

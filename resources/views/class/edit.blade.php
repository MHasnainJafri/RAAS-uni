@extends('layouts.layout')

@section('content')
    <!-- Navbar -->

    <!-- End Navbar -->
    <div class="col-12">
        <div class="card my-3">
            <div class="card-header bg-transparent">
    <div class="container-fluid py-4 ">


        <div class=" ">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-diagram-2"></i> Edit Class</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url()->previous()}}">Classes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Class</li>
                        </ol>
                    </nav>
                    @include('session-messages')
                    <div class="row">
                        <form class="col-6" action="{{route('school.class.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                            <input type="hidden" name="class_id" value="{{$class_id}}">
                            <div class="mb-3">
                                <label for="class_name" class="form-label">Class Name</label>
                                <input class="form-control" id="class_name" name="class_name" type="text" value="{{$schoolClass->class_name}}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
    </div></div></div></div></div>
@endsection

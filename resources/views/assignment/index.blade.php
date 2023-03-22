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
                                    <i class="bi bi-journal-medical"></i> Assignments
                                </h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{url()->previous()}}">Courses</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Assignments</li>
                                    </ol>
                                </nav>
                                <div class="mb-4 mt-4">
                                    <div class="p-3 mt-3 bg-white border shadow-sm">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Assignment Name</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($assignments as $assignment)
                                                    <tr>
                                                        <td>{{$assignment->assignment_name}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <a href="{{asset('storage/'.$assignment->assignment_file_path)}}" role="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-download"></i> Download</a>
                                                            </div>
                                                        </td>
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

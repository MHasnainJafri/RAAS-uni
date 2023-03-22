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
                                    <i class="bi bi-person-lines-fill"></i> Student
                                </h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                      <li class="breadcrumb-item"><a href="{{route('student.list.show')}}">Student List</a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                    </ol>
                                </nav>
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-3">
                                            <div class="card bg-light">
                                                <div class="px-5 pt-2">
                                                    @if (isset($student->photo))
                                                        <img src="{{asset('/storage'.$student->photo)}}" class="rounded-3 card-img-top" alt="Profile photo">
                                                    @else
                                                        <img src="{{asset('imgs/profile.png')}}" class="rounded-3 card-img-top" alt="Profile photo">
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$student->first_name}} {{$student->last_name}}</h5>
                                                    <p class="card-text">#ID: {{$promotion_info->id_card_number}}</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Gender: {{$student->gender}}</li>
                                                    <li class="list-group-item">Phone: {{$student->phone}}</li>
                                                    {{-- <li class="list-group-item"><a href="#">View Marks &amp; Results</a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-md-9">
                                            <div class="p-3 mb-3 border rounded bg-white">
                                                <h6>Student Information</h6>
                                                <table class="table table-responsive mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">First Name:</th>
                                                            <td>{{$student->first_name}}</td>
                                                            <th>Last Name:</th>
                                                            <td>{{$student->last_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email:</th>
                                                            <td>{{$student->email}}</td>
                                                            <th>Birthday:</th>
                                                            <td>{{$student->birthday}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Nationality:</th>
                                                            <td>{{$student->nationality}}</td>
                                                            <th>Religion:</th>
                                                            <td>{{$student->religion}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Address:</th>
                                                            <td>{{$student->address}}</td>
                                                            <th>Address2:</th>
                                                            <td>{{$student->address2}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">City:</th>
                                                            <td>{{$student->city}}</td>
                                                            <th>Zip:</th>
                                                            <td>{{$student->zip}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Blood Type:</th>
                                                            <td>{{$student->blood_type}}</td>
                                                            <th>Phone:</th>
                                                            <td>{{$student->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Gender:</th>
                                                            <td colspan="3">{{$student->gender}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="p-3 mb-3 border rounded bg-white">
                                                <h6>Parents' Information</h6>
                                                <table class="table table-responsive mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Father's Name:</th>
                                                            <td>{{$student->parent_info->father_name}}</td>
                                                            <th>Mother's Name:</th>
                                                            <td>{{$student->parent_info->mother_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Father's Phone:</th>
                                                            <td>{{$student->parent_info->father_phone}}</td>
                                                            <th>Mother's Phone:</th>
                                                            <td>{{$student->parent_info->mother_phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Address:</th>
                                                            <td colspan="3">{{$student->parent_info->parent_address}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="p-3 mb-3 border rounded bg-white">
                                                <h6>Academic Information</h6>
                                                <table class="table table-responsive mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Class:</th>
                                                            <td>{{$promotion_info->section->schoolClass->class_name}}</td>
                                                            <th>Board Reg. No.:</th>
                                                            <td>{{$student->academic_info->board_reg_no}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Section:</th>
                                                            <td colspan="3">{{$promotion_info->section->section_name}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
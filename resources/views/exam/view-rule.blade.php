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
                                    <i class="bi bi-file-text"></i> Exam Rules
                                </h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{url()->previous()}}">Exams</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Exam Rules</li>
                                    </ol>
                                </nav>
                                <div class="mb-4 bg-white border shadow-sm p-3">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Total Marks</th>
                                                <th scope="col">Pass Marks</th>
                                                <th scope="col">Marks Distribution Note</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exam_rules as $exam_rule)
                                            <tr>
                                                <td>{{$exam_rule->total_marks}}</td>
                                                <td>{{$exam_rule->pass_marks}}</td>
                                                <td>{{$exam_rule->marks_distribution_note}}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a type="button" href="{{route('exam.rule.edit', [
                                                            'exam_rule_id' => $exam_rule->id
                                                        ])}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pen"></i> Edit</a>
                                                        {{-- <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-trash2"></i> Delete</button> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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

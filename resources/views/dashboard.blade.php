@extends('layouts.layout')

@section('content')



        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold"> Total Students</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $studentCount }}
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Teachers</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $teacherCount }}
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Classes</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $classCount }}
                                        </h5>

                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

{{-- male to female ratio --}}
            {{-- @if($studentCount > 0)
            <div class="mt-3 d-flex align-items-center">
                <div class="col-3">
                    <span class="ps-2 me-2">Students %</span>
                    <span class="badge rounded-pill border" style="background-color: #0678c8;">Male</span>
                    <span class="badge rounded-pill border" style="background-color: #49a4fe;">Female</span>
                </div>
                @php
                $maleStudentPercentage = round(($maleStudentsBySession/$studentCount), 2) * 100;
                $maleStudentPercentageStyle = "style='background-color: #0678c8; width: $maleStudentPercentage%'";

                $femaleStudentPercentage = round((($studentCount - $maleStudentsBySession)/$studentCount), 2) * 100;
                $femaleStudentPercentageStyle = "style='background-color: #49a4fe; width: $femaleStudentPercentage%'";
                @endphp
                <div class="col-9 progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" {!!$maleStudentPercentageStyle!!} aria-valuenow="{{$maleStudentPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$maleStudentPercentage}}%</div>
                    <div class="progress-bar progress-bar-striped" role="progressbar" {!!$femaleStudentPercentageStyle!!} aria-valuenow="{{$femaleStudentPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$femaleStudentPercentage}}%</div>
                  </div>
            </div>
            @endif --}}



            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card mb-3">
                        <div class="card-header bg-transparent"><i class="bi bi-calendar-event me-2"></i> Events</div>
                        <div class="card-body text-dark">
                            @include('components.events.event-calendar', [
                                'editable' => 'false',
                                'selectable' => 'false',
                            ])
                            {{-- <div class="overflow-auto" style="height: 250px;">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Some placeholder content in a paragraph.</p>
                                <small>And some small print.</small>
                            </a>
                        </div>
                    </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-3">
                        <div class="card-header bg-transparent d-flex justify-content-between"><span><i
                                    class="bi bi-megaphone me-2"></i> Notices</span> {{ $notices->links() }}</div>
                        <div class="card-body p-0 text-dark">
                            <div>
                                @isset($notices)
                                    <div class="accordion accordion-flush" id="noticeAccordion">
                                        @foreach ($notices as $notice)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading{{ $notice->id }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse{{ $notice->id }}"
                                                        aria-expanded={{ $loop->first ? 'true' : 'false' }}
                                                        aria-controls="flush-collapse{{ $notice->id }}">
                                                        Published at: {{ $notice->created_at }}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{ $notice->id }}"
                                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : 'hide' }}"
                                                    aria-labelledby="flush-heading{{ $notice->id }}"
                                                    data-bs-parent="#noticeAccordion">
                                                    <div class="accordion-body overflow-auto text-dark">{!! Purify::clean($notice->notice) !!}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                    @if (count($notices) < 1)
                                        <div class="p-3">No notices</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="" class="nav-link text-muted"
                                        target="_blank">RAAS AI</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link text-muted"
                                        target="_blank">About
                                        Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

@endsection

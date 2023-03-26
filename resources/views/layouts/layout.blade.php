<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="./assets/img/favicon.png')}}">
        <title>
          Argon Dashboard 2 byRAAS AI Attendance
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>
        <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <link href="{{asset('css/bootstrap-icons-1.7.1/font/bootstrap-icons.css')}}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css')}}?v=2.0.4" rel="stylesheet" />
      </head>
<body class="g-sidenav-show   bg-gray-100">


    <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/home"
        target="_blank">
        <img src="{{asset('landing/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">RAAS AI</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">




        <li class="nav-item">
            <a class="nav-link {{ request()->is('home')? 'active' : '' }}" href="{{url('home')}}">
                <i class=" bi bi-grid"></i> <span class="nav-link-text ms-1">{{ __('Dashboard') }}</span></a>
        </li>
        {{-- @if (Auth::user()->role == "teacher")
        <li class="nav-item">
            <a type="button" href="{{url('attendances')}}" class="d-flex nav-link {{ request()->is('attendances*')? 'active' : '' }}"><i class="bi bi-calendar2-week"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
        </li>
        @endif --}}
        @can('view classes')
        <li class="nav-item">
            @php
                if (session()->has('browse_session_id')){
                    $classCount = \App\Models\SchoolClass::where('session_id', session('browse_session_id'))->count();
                } else {
                    $latest_session = \App\Models\SchoolSession::latest()->first();
                    if($latest_session) {
                        $classCount = \App\Models\SchoolClass::where('session_id', $latest_session->id)->count();
                    } else {
                        $classCount = 0;
                    }
                }
            @endphp
            <a class="nav-link d-flex {{ request()->is('classes')? 'active' : '' }}" href="{{url('classes')}}"><i class="bi bi-diagram-3"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Classes</span> <span class="ms-auto d-inline d-sm-none d-md-none d-xl-inline">{{ $classCount }}</span></a>
        </li>
        @endcan
        @if(Auth::user()->role != "student")
        <li class="nav-item">
            <a type="button" href="#student-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('students*')? 'active' : '' }}"><i class="bi bi-person-lines-fill"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Students</span>
                <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
            </a>
            <ul class="nav collapse {{ request()->is('students*')? 'show' : 'hide' }} bg-white" id="student-submenu">
                <li class="nav-item w-100" {{ request()->routeIs('student.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('student.list.show')}}"><i class="bi bi-person-video2 me-2"></i> View Students</a></li>
                @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                <li class="nav-item w-100" {{ request()->routeIs('student.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('student.create.show')}}"><i class="bi bi-person-plus me-2"></i> Add Student</a></li>
                @endif
            </ul>
        </li>
        <li class="nav-item">
            <a type="button" href="#teacher-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('teachers*')? 'active' : '' }}"><i class="bi bi-person-lines-fill"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Teachers</span>
                <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
            </a>
            <ul class="nav collapse {{ request()->is('teachers*')? 'show' : 'hide' }} bg-white" id="teacher-submenu">
                <li class="nav-item w-100" {{ request()->routeIs('teacher.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('teacher.list.show')}}"><i class="bi bi-person-video2 me-2"></i> View Teachers</a></li>
                @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                <li class="nav-item w-100" {{ request()->routeIs('teacher.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('teacher.create.show')}}"><i class="bi bi-person-plus me-2"></i> Add Teacher</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if(Auth::user()->role == "teacher")
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('courses/teacher*') || request()->is('courses/assignments*'))? 'active' : '' }}" href="{{route('course.teacher.list.show', ['teacher_id' => Auth::user()->id])}}"><i class="bi bi-journal-medical"></i> <span class="nav-link-text ms-1">My Courses</span></a>
        </li>
        @endif
        @if(Auth::user()->role == "student")
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('student.attendance.show')? 'active' : '' }}" href="{{route('student.attendance.show', ['id' => Auth::user()->id])}}"><i class="bi bi-calendar2-week"></i> <span class="nav-link-text ms-1">Attendance</span></a>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('course.student.list.show')? 'active' : '' }}" href="{{route('course.student.list.show', ['student_id' => Auth::user()->id])}}"><i class="bi bi-journal-medical"></i> <span class="nav-link-text ms-1">Courses</span></a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-file-post"></i> <span class="nav-link-text ms-1">Assignments</span></a>
        </li><li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-cloud-sun"></i> <span class="nav-link-text ms-1">Marks</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-journal-text"></i> <span class="nav-link-text ms-1">Syllabus</span></a>
        </li> --}}
        <li class="nav-item border-bottom">
            @php
                if (session()->has('browse_session_id')){
                    $class_info = \App\Models\Promotion::where('session_id', session('browse_session_id'))->where('student_id', Auth::user()->id)->first();
                } else {
                    $latest_session = \App\Models\SchoolSession::latest()->first();
                    if($latest_session) {
                        $class_info = \App\Models\Promotion::where('session_id', $latest_session->id)->where('student_id', Auth::user()->id)->first();
                    } else {
                        $class_info = [];
                    }
                }
            @endphp
            <a class="nav-link" href="{{route('section.routine.show', [
                'class_id'  => $class_info->class_id,
                'section_id'=> $class_info->section_id
            ])}}"><i class="bi bi-calendar4-range"></i> <span class="nav-link-text ms-1">Routine</span></a>
        </li>
        @endif
        @if(Auth::user()->role != "student")
        {{-- <li class="nav-item border-bottom">
            <a type="button" href="#exam-grade-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('exams*')? 'active' : '' }}"><i class="bi bi-file-text"></i> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Exams / Grades</span>
                <i class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></i>
            </a>
            <ul class="nav collapse {{ request()->is('exams*')? 'show' : 'hide' }} bg-white" id="exam-grade-submenu">
                <li class="nav-item w-100" {{ request()->routeIs('exam.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.list.show')}}"><i class="bi bi-file-text me-2"></i> View Exams</a></li>
                @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                <li class="nav-item w-100" {{ request()->routeIs('exam.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.create.show')}}"><i class="bi bi-file-plus me-2"></i> Create Exams</a></li>
                @endif
                @if (Auth::user()->role == "admin")
                <li class="nav-item w-100" {{ request()->routeIs('exam.grade.system.create')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.grade.system.create')}}"><i class="bi bi-file-plus me-2"></i> Add Grade Systems</a></li>
                @endif
                <li class="nav-item w-100" {{ request()->routeIs('exam.grade.system.index')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.grade.system.index')}}"><i class="bi bi-file-ruled me-2"></i> View Grade Systems</a></li>
            </ul>
        </li> --}}

        @endif
        @if (Auth::user()->role == "admin")
        <li class="nav-item">
            <a class="nav-link {{ request()->is('notice*')? 'active' : '' }}" href="{{route('notice.create')}}"><i class="bi bi-megaphone"></i> <span class="nav-link-text ms-1">Notice</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('calendar-event*')? 'active' : '' }}" href="{{route('events.show')}}"><i class="bi bi-calendar-event"></i> <span class="nav-link-text ms-1">Event</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('syllabus*')? 'active' : '' }}" href="{{route('class.syllabus.create')}}"><i class="bi bi-journal-text"></i> <span class="nav-link-text ms-1">Syllabus</span></a>
        </li>
        <li class="nav-item border-bottom">
            <a class="nav-link {{ request()->is('routine*')? 'active' : '' }}" href="{{route('section.routine.create')}}"><i class="bi bi-calendar4-range"></i> <span class="nav-link-text ms-1">Routine</span></a>
        </li>
        @endif
        @if (Auth::user()->role == "admin")
        <li class="nav-item">
            <a class="nav-link {{ request()->is('academics*')? 'active' : '' }}" href="{{url('academics/settings')}}"><i class="bi bi-tools"></i> <span class="nav-link-text ms-1">Academic</span></a>
        </li>
        @endif
        @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->is('promotions*')? 'active' : '' }}" href="{{url('promotions/index')}}"><i class="bi bi-sort-numeric-up-alt"></i> <span class="nav-link-text ms-1">Promotion</span></a>
        </li> --}}
        @endif













      </ul>

    </div>

  </aside>
  <main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">

        <h6 class="font-weight-bolder text-white mb-0">
           Role  <span class="badge bg-light text-dark"> {{ ucfirst(Auth::user()->role) }}</span>
        </h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">

            <div class="dropdown">
                <button class="btn bg-gradient-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li>
                    <a class="dropdown-item " href="
                    {{-- {{ route('logout') }} --}}
                    "
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="bi bi-door-open me-2"></i> {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>

                </li>

                </ul>
              </div>






        </div>
        </div>

      </div>
    </div>
  </nav>

            @yield('content')


  </main>



  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/argon-dashboard.min.js')}}?v=2.0.4"></script>




</body>
</html>

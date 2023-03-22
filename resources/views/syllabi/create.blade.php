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
                            <div class="col-md-5 ps-4">
                                <h1 class="display-6 mb-3"><i class="bi bi-journal-text"></i> Create Syllabus</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create Syllabus</li>
                                    </ol>
                                </nav>
                                @include('session-messages')
                                <div class="p-3 border bg-light shadow-sm">
                                    <form action="{{route('syllabus.store')}}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="session_id" value="{{$current_school_session_id}}">
                                        <div class="mb-3">
                                            <p>Add Syllabus to class:</p>
                                            <select onchange="getCourses(this);" class="form-select" name="class_id" required>
                                                @isset($school_classes)
                                                    <option selected disabled>Please select a class</option>
                                                    @foreach ($school_classes as $school_class)
                                                    <option value="{{$school_class->id}}">{{$school_class->class_name}}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mb-2">Select course:<sup><i class="bi bi-asterisk text-primary"></i></sup></p>
                                            <select class="form-select" id="course-select" name="course_id">
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="syllabus-name" class="form-label">Syllabus Name</label>
                                            <input type="text" class="form-control" id="syllabus-name" name="syllabus_name" placeholder="Syllabus Name" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="syllabus-file" class="form-label">Syllabus File</label>
                                            <input type="file" name="file" class="form-control" id="syllabus-file" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> Create</button>
                                        </div>
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
    <script>
        function getCourses(obj) {
            var class_id = obj.options[obj.selectedIndex].value;

            var url = "{{route('get.sections.courses.by.classId')}}?class_id=" + class_id

            fetch(url)
            .then((resp) => resp.json())
            .then(function(data) {

                var courseSelect = document.getElementById('course-select');
                courseSelect.options.length = 0;
                data.courses.unshift({'id': 0,'course_name': 'Please select a course'})
                data.courses.forEach(function(course, key) {
                    courseSelect[key] = new Option(course.course_name, course.id);
                });
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    </script>
@endsection

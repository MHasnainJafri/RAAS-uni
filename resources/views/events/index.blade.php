@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class=" ">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3"><i class="bi bi-calendar-event"></i> Create Events</h1>
                    <div class="row bg-white p-4 shadow-sm">
                        @include('components.events.event-calendar', ['editable' => 'true', 'selectable' => 'true'])
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Home')

@section('page-header', 'Home')

@section('side-content')
    <div class="well">
        <h4>Course</h4>
        @if (count(Auth::user()->courses()->get()) > 0)
            <div class="list-group">
                @foreach (Auth::user()->courses()->get() as $class)
                    <a href="{{ url('course/' . $course->id) }}" class="list-group-item list-group-item-info">
                        <h4 class="list-group-item-heading">
                            {{ $class->subject }} {{ $class->class }}-{{ $class->section }}
                        </h4>
                        <p class="list-group-item-text">{{ $class->title }}</p>
                    </a>
                @endforeach
            </div>
        @else
            @if (Auth::user()->role == 'teacher')
                <div class="alert alert-danger" role="alert">You do not have any active course.</div>
            @else
                <div class="alert alert-danger" role="alert">You are no taking any course.</div>
            @endif
        @endif
    </div>

    <div class="well">
        <h4>Messages</h4>
        @if (count(Auth::user()->messages()->where('to', '=', Auth::user()->id)->get()) > 0)
            <div class="list-group">
                @foreach (Auth::user()->messages()->where('to', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get() as $message)
                    <a href="{{ url('/message/' . $message->id) }}" class="list-group-item list-group-item-info">
                        <h4 class="list-group-item-heading">
                            {{ $message->title }}
                        </h4>
                        <p class="list-group-item-text">{{ $message->message }}</p>
                    </a>
                @endforeach
            </div>
        @else
            <div class="alert alert-danger">Currently, you don't have any new messages.</div>
        @endif
    </div>

    @if (isset($assignments))
        @if (count($assignments) > 0)
            <div class="well">
                <h4>Assignments</h4>
                <div class="list-group">
                    @foreach ($assignments as $assignment)
                        <a href="{{ url('/course/' . $class_id . '/assignment/' . $assignment->id) }}"
                           class="list-group-item list-group-item-info">
                            <h4 class="list-group-item-heading">{{ $assignment->title }}</h4>
                            <p class="list-group-item-text">Due Date:
                                <u>{{ date('F jS Y \a\t h:i A', strtotime($assignment->due_date)) }}</u></p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@endsection

@section('content')

    <!-- Display flashed session data on successful action -->
    @include('pages.teacher.session-data')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                Recent Activity...
            </h4>
        </div>

        <div class="panel-body">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                @if (count($recent_activity) > 0)
                    <div class="list-group">
                        @foreach ($recent_activity as $activity)
                            @if ($activity->type == 'assignment')
                                <a href="{{ url('/course/' . $activity->course_id . '/assignment/' . $activity->id) }}"
                                   class="list-group-item list-group-item-success">
                                    <h4 class="list-group-item-heading">{{ $activity->course_info }}
                                        - {{ $activity->title }}</h4>
                                    <p class="list-group-item-text">
                                    <p>{{ date('F jS Y \a\t h:i A', strtotime($activity->created_at)) }}</p>
                                    <p>{{ $activity->description }}</p>
                                    </p>
                                </a>
                            @else
                                <a href="{{ url('/course/' . $activity->course_id . '/annoucement/' . $activity->id) }}"
                                   class="list-group-item list-group-item-info">
                                    <h4 class="list-group-item-heading">{{ $activity->course_info }}
                                        - {{ $activity->title }}</h4>
                                    <p class="list-group-item-text">
                                    <p>{{ date('F jS Y \a\t h:i A', strtotime($activity->created_at)) }}</p>
                                    <p>{{ $activity->message }}</p>
                                    </p>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-danger">
                        There is no recent activity. Please check back again later.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

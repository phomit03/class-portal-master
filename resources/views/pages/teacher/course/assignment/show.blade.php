@extends('layouts.app')

@section('title', 'Assignment Detail')

@section('page-header', 'Assignment Information')

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
                Details About Assignment
            </h4>
        </div>

        <div class="panel-body">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="well">
                    <h3>{{ $assignment->title }}</h3>
                    <h4>{{ $course_name }}</h4>
                    <p><strong>Due Date:</strong>
                        <u>{{ date('F jS Y \a\t h:i A', strtotime($assignment->due_date)) }}</u></p>
                    <br/>
                    <p>{{ $assignment->description }}</p>
                </div>
                @if (Auth::user()->id == $course_instructor)
                    <form role="form" method="post"
                          action="{{ url('/course/' . $course_id . '/assignment/' . $assignment->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <!-- Delete Button -->
                        <button type="submit" class="btn btn-danger pull-right">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    @if (Auth::user()->id == $course_instructor)
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Edit Assignment Information
                </h4>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ url('/course/' . $course_id . '/assignment/' . $assignment->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <!-- Title -->
                        <div class="form-group{{ $errors->has('title') ? ' has-error': '' }}">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title"
                                       value="{{ old('title') ? old('title') : $assignment->title }}">

                                @if ($errors->has('title'))
                                    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <!-- Due Date -->
                        <div class="form-group{{ $errors->has('due_date') ? ' has-error': '' }}">
                            <label class="col-md-3 control-label">Due Date</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" name="due_date"
                                       value="{{ old('due_date') ? old('due_date') : $due_date_formatted }}">

                                @if ($errors->has('due_date'))
                                    <span class="help-block"><strong>{{ $errors->first('due_date') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group{{ $errors->has('description') ? ' has-error': '' }}">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="description"
                                          rows="3">{{ old('description') ? old('description') : $assignment->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-7">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
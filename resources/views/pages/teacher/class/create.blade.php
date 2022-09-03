@extends('layouts.app')

@section('title', 'Add Class')

@section('page-header', 'Add New class')

@section('content')
    <!--side-content-->
    <div class="col-xs-12 col-md-4">
        <div class="well">
            <h4>Classes</h4>
            @if (count(Auth::user()->classes()->get()) > 0)
                <div class="list-group">
                    @foreach (Auth::user()->classes()->get() as $class)
                        <a href="{{ url('class')}}/{{$class->id}}" class="list-group-item list-group-item-info">
                            <h4 class="list-group-item-heading">
                                {{ $class->name }} {{ $class->room }}-{{ $class->section }}
                            </h4>
                            <p class="list-group-item-text">{{ $class->title }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                @if (Auth::user()->role == 'teacher')
                    <div class="alert alert-danger" role="alert">You do not have any active classes.</div>
                @else
                    <div class="alert alert-danger" role="alert">You are no taking any classes.</div>
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
                <div class="alert alert-danger" role="alert=">Currently, you don't have any new messages.</div>
            @endif
        </div>

        @if (isset($assignments))
            @if (count($assignments) > 0)
                <div class="well">
                    <h4>Assignments</h4>
                    <div class="list-group">
                        @foreach ($assignments as $assignment)
                            <a href="{{ url('/subject/' . $subject_id . '/assignment/' . $assignment->id) }}" class="list-group-item list-group-item-info">
                                <h4 class="list-group-item-heading">{{ $assignment->title }}</h4>
                                <p class="list-group-item-text">Due Date: <u>{{ date('F jS Y \a\t h:i A', strtotime($assignment->due_date)) }}</u></p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
    <!--end side-content-->

    <!-- Display flashed session data on successful action -->
    <div class="col-xs-12 col-md-8">
        @include('pages.teacher.session-data')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Create New Class
                </h4>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-md-12">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/class') }}">
                        {{ csrf_field() }}

                        <!-- Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       placeholder="T2108M">

                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="form-group{{ $errors->has('title') ? ' has-error': '' }}">
                            <label class="col-md-4 control-label">Title</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                       placeholder="Roadmap To Computing">

                                @if ($errors->has('title'))
                                    <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <!-- Room -->
                        <div class="form-group{{ $errors->has('room') ? ' has-error': '' }}">
                            <label class="col-md-4 control-label">Room</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="room" value="{{ old('room') }}"
                                       placeholder="01">

                                @if ($errors->has('room'))
                                    <span class="help-block"><strong>{{ $errors->first('room') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <!-- Section -->
                        <div class="form-group{{ $errors->has('section') ? ' has-error': '' }}">
                            <label class="col-md-4 control-label">Section</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="section" value="{{ old('section') }}"
                                       placeholder="001">

                                @if ($errors->has('section'))
                                    <span class="help-block"><strong>{{ $errors->first('section') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-7">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

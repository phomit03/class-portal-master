@extends('layouts.app')

@section('title', 'Class Details')

@section('page-header', 'Class Details')

@section('content')
    <!--side-content-->
    <div class="col-xs-12 col-md-4">
        <div class="well">
            <h4>Classes</h4>
            @if (count(Auth::user()->classes()->get()) > 0)
                <div class="list-group">
                    @foreach (Auth::user()->classes()->get() as $subject)
                        <a href="{{ url('subject/' . $subject->id) }}" class="list-group-item list-group-item-info">
                            <h4 class="list-group-item-heading">
                                {{ $subject->name }}
                            </h4>
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

        <!-- Show class title and instructor's name -->
        <div class="row">
            @if (Auth::user()->id == $instructor->id)
                <div class="col-md-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                {{ $subject->name }} - {{ $subject->description }}
                                <a href="{{ url('/profile/' . $instructor->id) }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <form role="form" method="POST" action="{{ url('/subject/' . $subject->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger btn-block" style="margin-top: 2px">Delete</button>
                    </form>
                </div>
            @else
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                {{ $subject->name }} - {{ $subject->description }}
                                <a href="{{ url('/profile/' . $instructor->id) }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{--Edit + Add--}}
        @if (Auth::user()->id == $instructor->id)
            <!-- Edit Class Information -->
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                           aria-controls="collapseOne">Edit Class Information or Add Students</a>
                    </h4>
                </div>

                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labellledby="headingOne">
                    <div class="panel-body">
                        <div class="col-xs-12 col-md-12">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ url('subject/' . $subject->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <!-- Name -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                               value="{{ old('name') ? old('name') : $subject->name }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group{{ $errors->has('description') ? ' has-error': '' }}">
                                    <label class="col-md-3 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="description"
                                               value="{{ old('description') ? old('description') : $subject->description }}">

                                        @if ($errors->has('description'))
                                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Edit Button -->
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-7">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>

                            <hr>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <a href="{{ url('/class/' . $class->id . '/students') }}">
                                    <button type="button" class="btn btn-success btn-block">Add Students</button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{--chuyển phần này qua subjects--}}

        {{--Lich su assignment da tao--}}
        @if (isset($recent_activity) && count($recent_activity) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Recent Assignment Activity
                    </h4>
                </div>

                <div class="panel-body">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <div class="list-group">
                            @foreach ($recent_activity as $activity)
                                <a href="{{ url('/class/' . $activity->class_id . '/assignment/' . $activity->id) }}"
                                   class="list-group-item list-group-item-warning">
                                    <h4 class="list-group-item-heading">{{ $activity->title }}</h4>
                                    <p class="list-group-item-text">{{ $activity->description }}</p>
                                    <p class="list-group-item-text"><b>Due Date:</b>
                                        <u>{{ date('F jS Y \a\t h:i A', strtotime($activity->due_date)) }}</u>
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- add asignment theo class--}}
        @if (Auth::user()->role == 'teacher' && Auth::user()->id == $instructor->id)
            <!-- Add Quizzes, Assignments, and Annoucements -->
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">
                        Add Assignments {{--& Annoucements--}}
                    </h4>
                </div>

                <div class="panel-body">
                    <div class="btn-group col-md-offset-9">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Select Type <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="assignment">Assignment</a></li>
                            {{--<li><a href="#" id="annoucement">Annoucement</a></li>--}}
                        </ul>
                    </div>

                    <!--form assignment-->
                    <div id="forms">
                        <div id="assignment-form" class="forms">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/class/' . $class_id . '/assignment') }}">
                                {{ csrf_field() }}


                                <!-- Title -->
                                <div class="form-group{{ $errors->has('title') ? ' has-error': ''}}">
                                    <label class="col-md-3 control-label">Title</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Chapter 1 Assignment">

                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group{{ $errors->has('description') ? ' has-error': ''}}">
                                    <label class="col-md-3 control-label">Description</label>
                                    <div class="col-md-5">
                                        <textarea class="form-control" name="description" value="{{ old('description') }}" placeholder="Type in the description here..." rows="4"></textarea>

                                        @if ($errors->has('description'))
                                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!--Source-->
                                <div class="form-group{{ $errors->has('source') ? ' has-error': ''}}">
                                    <label class="col-md-3 control-label">Source</label>
                                    <div class="col-md-5">
                                        <input type="file" class="form-control" name="source" value="{{ old('source') }}" rows="4">

                                        @if ($errors->has('source'))
                                            <span class="help-block"><strong>{{ $errors->first('source') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Due Date -->
                                <div class="form-group{{ $errors->has('due_date') ? ' has-error': ''}}">
                                    <label class="col-md-3 control-label">Due Date</label>
                                    <div class="col-md-5">
                                        <input type="datetime-local" class="form-control" name="due_date" value="{{ old('due_date') }}">

                                        @if ($errors->has('due_date'))
                                            <span class="help-block"><strong>{{ $errors->first('due_date') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        {{--<div id="annoucement-form" class="forms">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/class/' . $class_id . '/annoucement') }}">
                                {{ csrf_field() }}

                                <!-- Title -->
                                <div class="form-group{{ $errors->has('title') ? ' has-error': ''}}">
                                    <label class="col-md-3 control-label">Title</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Important Annoucement">

                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="form-group{{ $errors->has('message') ? ' has-error': ''}}">
                                    <label class="col-md-3 control-label">Message</label>
                                    <div class="col-md-5">
                                        <textarea class="form-control" name="message" value="{{ old('message') }}" placeholder="Type in your message here..." rows="3"></textarea>

                                        @if ($errors->has('message'))
                                            <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>--}}
                    </div>
                    <!--end form-->
                </div>
            </div>
        @endif
    </div>
@endsection

{{--chuyển phần này qua subjects--}}
@push('scripts')
    <script src=" {{ asset('js/toggle-assignment-type.js') }}"></script>
@endpush

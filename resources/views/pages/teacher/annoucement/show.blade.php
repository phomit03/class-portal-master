@extends('layouts.app')

@section('title', 'Annoucement Details')

@section('page-header', 'Annoucement Information')

@section('content')
    <!--side-content-->
    <div class="col-xs-12 col-md-4">
        <div class="well">
            <h4>classes</h4>
            @if (count(Auth::user()->classes()->get()) > 0)
                <div class="list-group">
                    @foreach (Auth::user()->classes()->get() as $class)
                        <a href="{{ url('class/' . $class->id) }}" class="list-group-item list-group-item-info">
                            <h4 class="list-group-item-heading">
                                {{ $class->subject }} {{ $class->class }}-{{ $class->section }}
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
                            <a href="{{ url('/class/' . $class_id . '/assignment/' . $assignment->id) }}" class="list-group-item list-group-item-info">
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
                    Details About Annoucement
                </h4>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="well">
                        <h3>{{ $annoucement->title }}</h3>
                        <h4>{{ $class->subject }} {{ $class->class }}-{{ $class->section }}</h4>
                        <br/>
                        <p> {{ $annoucement->message }}</p>
                    </div>
                    @if (Auth::user()->id == $class->user_id)
                        <form role="form" method="POST"
                              action="{{ url('/class/' . $class->id . '/annoucement/' . $annoucement->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <!-- Delete Button -->
                            <button type="submit" class="btn btn-danger pull-right">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        @if (Auth::user()->id == $class->user_id)
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        Edit This Annoucement
                    </h4>
                </div>

                <div class="panel-body">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/class/' . $class->id . '/annoucement/' . $annoucement->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <!-- Title -->
                            <div class="form-group{{ $errors->has('title') ? ' has-error': ''}}">
                                <label class="col-md-3 control-label">Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title"
                                           value="{{ old('title') ? old('title') : $annoucement->title }}">

                                    @if ($errors->has('title'))
                                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="form-group{{ $errors->has('message') ? ' has-error': ''}}">
                                <label class="col-md-3 control-label">Message</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="message"
                                              rows="3">{{ old('message') ? old('message') : $annoucement->message }}</textarea>

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
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection

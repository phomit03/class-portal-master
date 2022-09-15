@extends('layouts.app')
@section('title', 'Assignments')
@section('page-header', 'Assignments')
@section('content')
    <div class="col-xs-12 col-md-12">
        @include('pages.teacher.session-data')

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Assignments
                </h4>
            </div>
            <div class="col-md-12">
                <a href="{{ route('teacher.assignment.create') }}" class="btn-add"><button type="button" class="btn btn-success">Add Assignment</button></a>
            </div>
            <div class="panel-body">
                <div class="col-xs-12 col-md-12">
                    @include('pages.teacher.assignment.table-assignment', compact('assignments'))
                </div>
            </div>
        </div>
    </div>
@endsection
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
                    @foreach (Auth::user()->classes()->get() as $class)
                        <a href="{{ url('class/' . $class->id) }}" class="list-group-item list-group-item-info">
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
                <div class="alert alert-danger">Currently, you don't have any new messages.</div>
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
            @if ($instructor->role == "teacher" && $class1 != null)
                <div class="col-md-10">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                {{ $class1->name }} - {{ $class1->section }} - {{ $class1->title }} - {{ $class1->room }} -
                                <a href="{{ url('/profile/' . $instructor->id) }}"> {{ $instructor->first_name }} {{ $instructor->last_name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <form role="form" method="POST" action="{{ url('/class/' . $class1->id) }}">
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
                                {{ $class1->name }} - {{ $class1->section }} - {{ $class1->title }} - {{ $class1->room }} -
                                <a> {{ $instructor->first_name }} {{ $instructor->last_name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{--Edit + Add--}}
        @if ($instructor->role == "teacher")
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
                                  action="{{ url('class/' . $class1->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <!-- Name -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"
                                               value="{{ old('name') ? old('name') : $class1->name }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Title -->
                                <div class="form-group{{ $errors->has('title') ? ' has-error': '' }}">
                                    <label class="col-md-3 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="title"
                                               value="{{ old('title') ? old('title') : $class1->title }}">

                                        @if ($errors->has('title'))
                                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Room -->
                                <div class="form-group{{ $errors->has('room') ? ' has-error': '' }}">
                                    <label class="col-md-3 control-label">Class</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="room"
                                               value="{{ old('room') ? old('room') : $class1->room }}">

                                        @if ($errors->has('room'))
                                            <span class="help-block"><strong>{{ $errors->first('room') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Section -->
                                <div class="form-group{{ $errors->has('section') ? ' has-error': '' }}">
                                    <label class="col-md-3 control-label">Section</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="section"
                                               value="{{ old('section') ? old('section') : $class1->section }}">

                                        @if ($errors->has('section'))
                                            <span class="help-block"><strong>{{ $errors->first('section') }}</strong></span>
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
                                <h3>Code: {{$class->class_code}}</h3>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <span>Join by link: <strong>{{url('class/'.$class1->id.$class->class_code)}}</strong></span>
                            </div>
                            <div class="col-xs-12 col-md-6 col-md-offset-3">
                                <a href="{{ url('/class/' . $class1->id . '/students') }}">
                                    <button type="button" class="btn btn-success btn-block">Add Students</button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif


{{--        --}}{{--chuyển phần này qua subjects--}}

{{--        --}}{{--Lich su assignment da tao--}}
{{--        @if (isset($recent_activity) && count($recent_activity) > 0)--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">--}}
{{--                    <h4 class="panel-title">--}}
{{--                        Recent Assignment Activity--}}
{{--                    </h4>--}}
{{--                </div>--}}

{{--                <div class="panel-body">--}}
{{--                    <div class="col-xs-12 col-md-10 col-md-offset-1">--}}
{{--                        <div class="list-group">--}}
{{--                            @foreach ($recent_activity as $activity)--}}
{{--                                <a href="{{ url('/class/' . $activity->class_id . '/assignment/' . $activity->id) }}"--}}
{{--                                   class="list-group-item list-group-item-warning">--}}
{{--                                    <h4 class="list-group-item-heading">{{ $activity->title }}</h4>--}}
{{--                                    <p class="list-group-item-text">{{ $activity->description }}</p>--}}
{{--                                    <p class="list-group-item-text"><b>Due Date:</b>--}}
{{--                                        <u>{{ date('F jS Y \a\t h:i A', strtotime($activity->due_date)) }}</u>--}}
{{--                                    </p>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

        {{-- add subject theo class--}}
        @if (Auth::user()->role == 'teacher' && Auth::user()->id == $instructor->id)
            <!-- Add Quizzes, Assignments, and Annoucements -->
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true"
                           aria-controls="collapseOne">Add Subject</a>
                    </h4>
                </div>

                <div  id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labellledby="headingOne">
                    <div class="btn-group col-md-offset-9">
{{--                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"--}}
{{--                                aria-haspopup="true" aria-expanded="false">--}}
{{--                            Select Type <span class="caret"></span>--}}
{{--                        </button>--}}
                        <select id="subject" name="subject" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <option value="">Select Option</option>
                            <option value="avai_Subject">Add Subject Available </option>
                            <option value="new_Subject">Add new Subject </option>
                        </select>
                    </div>

                    <!--form Subject-->
                    <div id="forms">
                        <div id="avai_subject" class="note" style="display: none">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/subject/save/') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Subject <span style="color: red">*</span></label>
                                    <input type="hidden" name="class_id" value="{{$class_id}}"/>
                                    <select name="subject_id" class="custom-select" required>
                                        <option value="">choose</option>
                                        @foreach($subjects as $items)
                                            <option @if(old('subject_id') == $items->subject_id) selected @endif value="{{$items->id}}">
                                                {{$items->name}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div id="new_subject" class="note" style="display: none">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/subject/new/save') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="class_id" value="{{$class_id}}"/>
                              <!--Name-->
                                <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                               placeholder="HTML">

                                        @if ($errors->has('name'))
                                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Title -->
                                <div class="form-group{{ $errors->has('description') ? ' has-error': '' }}">
                                    <label class="col-md-4 control-label">description</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="description" value="{{ old('description') }}"
                                               placeholder="Easy">

                                        @if ($errors->has('description'))
                                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
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
                    <!--end form-->
                </div>
            </div>
        @endif

        <div class="panel panel-default">
{{--            <div class="panel-heading" role="tab" id="headingOne">--}}
{{--                <h4 class="panel-title">--}}
{{--                    Subject--}}
{{--                </h4>--}}
{{--            </div>--}}
                    {{--                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"--}}
                    {{--                                aria-haspopup="true" aria-expanded="false">--}}
                    {{--                            Select Type <span class="caret"></span>--}}
                    {{--                        </button>--}}
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
{{--                                    <td><a href="{{url('/admin/student-edit',['id'=>$item->studentID])}}"><button type="button" class="btn btn-info">Edit</button></a></td>--}}
{{--                                    <td>--}}
{{--                                        <form action="{{url("/admin/student-delete",['student'=>$item->studentID])}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method("delete")--}}
{{--                                            <button type="submit" onclick="return confirm('delete Student {{$item->studentName}}?')" class="btn btn-outline-danger">Delete</button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
        </div>
        <!--End Subject-->

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
                        <select id="Action" name="Action" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Type<span class="caret"></span>
                            <option value="">Select option</option>
                            <option value="addAssignment">Add Assignment</option>
                            <option value="addDocument">Add Document</option>
                        </select>

                    </div>

                    <!--form assignment-->
                    <div id="addAssignment" style="display: none" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Assignment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"><form>
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <textarea class="form-control" id="ckeditor1"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="attachment" class="col-form-label">Attachment:</label>
                                            <input type="file" class="form-control" id="inputFile">
                                        </div>
                                        <div>
                                            <label for="" class="col-form-label">Due:</label>
                                            <input type="datetime-local" class="form-control" id="due">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" value="Accept" class="btn btn-primary">Accept</button>
                                    <button type="button" value="Close" class="btn btn-light" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="addDocument" style="display: none" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Description:</label>
                                            <textarea class="form-control" id="ckeditor2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="attach" class="col-form-label">Attachment:</label>
                                            <input type="file" class="form-control" id="inputFile">
                                        </div>
                                        <div>
                                            <label for="" class="col-form-label">Due:</label>
                                            <input type="datetime-local" class="form-control" id="due">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" value="Accept" class="btn btn-primary">Accept</button>
                                    <button type="button" value="Close" class="btn btn-light" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end form-->
                </div>
            </div>
        @endif
    </div>
@endsection

{{--chuyển phần này qua subjects--}}
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.note').hide();
            $('#subject').change(function () {
                $('.note').hide();
                var val = $(this).val();
                $('#avai_subject').hide();
                $('#new_subject').hide();
                if (val == 'avai_Subject') {
                    $('#avai_subject').show();
                }
                else if (val == 'new_Subject') {
                    $('#new_subject').show();
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.modal').hide();
            $('#Action').change(function () {
                $('.modal').hide();
                var val = $(this).val();
                $('#addAssignment').hide();
                $('#addDocument').hide();
                if (val == 'addAssignment') {
                    $('#addAssignment').modal();
                }
                else if (val == 'addDocument') {
                    $('#addDocument').modal();
                }
            });
        });
    </script>
    <script src=" {{ asset('js/toggle-assignment-type.js') }}"></script>
@endpush

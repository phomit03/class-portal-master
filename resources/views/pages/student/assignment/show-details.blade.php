@extends('layouts.app')

@section('title', 'Assignments')

@section('content')
    <div class="container">
        <article id="content-lesson-detail" class="content-lesson-detail detail-section">
            <ul class="breadcrumb none-list mg-0 mg-b-25 fs-16 text-normal"><li><a href="/home" class="text-decoration-none" title="Home">Home</a></li>
                <li class="separator">/</li>
                <li>
                    <a href="/show-subject" class="text-decoration-none breadcum-subject-detail" title="Name Subject">
                        Name Subject
                    </a>
                </li>
                <li class="separator">/</li>
                <li>
                    <a href="/show-assignment" class="text-decoration-none" title="Assignment">
                        Assignment
                    </a>
                </li>
                <li class="separator">/</li>
                <li>
                    <span title="Bài tập nhanh">Title Assignment</span>
                </li>
            </ul>

            <!--title-->
            <div class="entry-title edn-lesson-title fs-24 mg-b-16">
                <h1 class="left wrap-activity-title mg-0 fs-24 text-semibold"><span class="mg-r-5">Title Assignment</span></h1>
            </div>

            <div id="main-content-lesson" class="main-content-lesson row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div id="live-stream-section" class="view-live-stream hidden">
                        <div class="wrap-view-live-stream">
                        </div>
                    </div>
                    <div id="live-stream-notify-section" class="mg-b-25 hidden">
                    </div>
                    <div class="entry-lesson-content">
                        <!--description-->
                        <div class="wrap-main-activity">
                            <div class="wrap-entry-lesson-content">
                                <h4 class="mg-b-8">Content</h4>
                                <div class="wrap-activity-content"><p>Day la description assignment (if) else '--'</p></div>
                            </div>
                        </div>

                        <div id="assignment-detail-content" class="assignment-detail-content">
                            <div class="assignment-overview mg-b-30">
                                <div class="attach-teacher mg-b-16">
                                    <label class="text-semibold">Additional files:</label>
                                    <div class="attachment-teacher-wrap">
                                        <a target="_blank" href="https://s3-sgn09.fptcloud.com/faistorage/files/attachfiles/Assignment-8_d535c18d6e5d42fa9e02e190429e2b1f.pdf"
                                           title="Uploads - Source" class="text-decoration-none text-lightbold link-attach assignment-downloadable" download="">
                                            Đây là file source từ teacher
                                        </a>
                                    </div>
                                </div>
                                <div class="duedate mg-b-16">
                                    <label class="text-semibold">Due date:</label>
                                    <span class="label-duedate">15/07/2022 10:00 (GMT+07)</span>
                                </div>
                            </div>
                            <div class="hr-assignment mg-b-30"></div>

                            <div class="submit-for-student col-lg-8 col-xl-8">
                                <h3 class="mg-0" >Your assignment: </h3>
                                <br>
                                <!--nếu đã có results-->
                                    {{--<div class="submit-overview mg-b-30">
                                    <div class="mg-b-10">
                                        <p class="top text-lightbold">
                                            Submission status:
                                        </p>
                                        --}}{{--nếu có thì trả về link, chưa có thì trả về 'chưa nộp' và trả về class danger--}}{{--
                                        <span class="fs-14 text-lightbold my-submission-status submitted">Submitted</span>
                                    </div>
                                    <div class="mg-b-10">
                                        <p class="top text-lightbold">
                                            Submission time:
                                        </p>
                                        --}}{{--nếu có thì trả về link, chưa có thì trả về '--'--}}{{--
                                        <span class="my-submission-time text-bold">15/07/2022 09:57 (GMT+07)</span>
                                    </div>
                                    <div class="mg-b-10">
                                        <p class="top text-lightbold">
                                            Link/file assignment:
                                        </p>
                                        --}}{{--nếu có thì trả về link, chưa có thì trả về '--'--}}{{--
                                        <a target="_blank" href="https://s3-sgn09.fptcloud.com/faistorage/files/attachfiles/fsà_0ebe659b63dd48bc9e67fabe63961534_1240.png" title="" class="student-submitted-link text-lightbold text-decoration-none assignment-downloadable" download="true">
                                            Đây là source từ student
                                        </a>
                                    </div>
                                </div>--}}
                                <!--chưa có-->
                                <div>
                                    {{--<div id="collapseTwo">
                                        <select id="source_results" name="source_results" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <option value="">
                                                Choose Source Option <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </option>
                                            <option value="file_uploads">File Uploads</option>
                                            <option value="link">Link</option>
                                        </select>
                                    </div>--}}


                                    <div class="form">
                                        <!--form-->
                                        <form role="form" method="post" action="" enctype="multipart/form-data">
                                            @csrf
                                            @method("post")
                                            <div class="mb-3" id="file_uploads">
                                                <input class="form-control" type="file" id="formFile" value="" name="source">
                                                <div>
                                                    @if ($errors->has('source'))
                                                        <span class="help-block"><strong>{{ $errors->first('source') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="link" class="form-group">
                                                <input class="form-control" type="text" value="" name="source" placeholder="url link">
                                                <div>
                                                    @if ($errors->has('source'))
                                                        <span class="help-block"><strong>{{ $errors->first('source') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group" style="margin-top: 20px">
                                                <div>
                                                    <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                                                    <div>
                                                        @if ($errors->has('description'))
                                                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <br>

                                            {{--hết giờ thì disable button, chuyển qua re-submit--}}
                                            <div class="submit-area mg-b-20 align-right">
                                                <div style="cursor: not-allowed; display: inline-block;">
                                                    <button class="btn submit-results" type="button">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                        <!--end form-->
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--tab-panel-->
                {{--<aside class="col-12 col-lg-4 col-xl-4 course-sidebar hide-on-992">
                    <div class="wrap-course-sidebar course-sidebar-sticky">
                        <div class="top">
                            <div class="course-thumb-wrap">
                            </div>
                            <div class="course-sumary-desktop pd-15">
                                <div class="course-sumary">
                                    <div class="lectures-section">
                                        <div class="heading-lectures-section">
                                            <h3 class="mg-0" >Your assignment</h3>
                                        </div>
                                        <hr>
                                        <form role="form" method="post" action="" enctype="multipart/form-data">
                                            @csrf
                                            @method("post")

                                            <div class="form-group">
                                                <div class="">
                                                    <input class="form-control" type="text" class="form-control" value="" name="" placeholder="url link">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <input class="form-control" type="file" id="formFile" value="" name="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <textarea class="form-control" name="" rows="3" placeholder="Description Result"></textarea>
                                                </div>
                                            </div>

                                            <br>

                                            --}}{{--hết giờ thì disable button, chuyển qua re-submit--}}{{--
                                            <div class="submit-area mg-b-20">
                                                <div style="cursor: not-allowed; display: inline-block;">
                                                    <button class="btn submit-results" type="button">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row mg-t-10 update-button-detail" style="display: none;"></div>
                                <div class="row mg-t-10 export-class-activity" style="display: none;"></div>
                            </div>
                            <!--End Case studying-->
                        </div>
                    </div>
                </aside>--}}
                <!--/tab-panel-->

            </div>
        </article>
    </div>

@endsection


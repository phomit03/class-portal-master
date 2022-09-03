@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @if (count(Auth::user()->classes()->get()) > 0)
        <div class="session-group ui-tabs-panel ui-widget-content" id="course-member" role="tabpanel" aria-hidden="false" style="" aria-labelledby="session-group-tab">
            <section class="course-section">
                <div class="wrap-slider-content">
                    <div class="wrap-course-section">
                        <div class="list-course row">
                            @foreach (Auth::user()->classes()->get() as $class)
                                <article class="course-item col-md-4 col-sm-6 col-lg-3 publish" style="padding: 0 0 30px; margin: 0 15px;">
                                    <div class="wrap-course-item">
                                        <div class="course-infor" style="padding: 20px">
                                            <h3 class="course-title mg-b-15 fs-18">
                                                <a href="{{ url('class/' . $class->id) }}" title="{{ $class->name }}" style="font-size: 16px">
                                                    {{$class->name}}
                                                </a>
                                            </h3>
                                            <ul class="bottom-course-sum none-list mg-0 fs-14 mg-b-15">
                                                <li>
                                                    <i class="la la-user-circle"></i>
                                                    <span title="{{ $class->title }}">{{ $class->title }}</span>
                                                </li>
                                                <li>
                                                    <i class="la la-user-circle"></i>
                                                    <span title="HOATQ4@FPT.EDU.VN">HOATQ4@FPT.EDU.VN</span>
                                                </li>
                                                <li>
                                                    <i class="las la-id-card"></i>
                                                    <span title="Number of students: 16">Number of students: 16</span>
                                                </li>
                                            </ul>
                                            <a class="view-detail text-decoration-none fs-14 mg-b-5" href="/xyz" title="Go to course">
                                                Go to class <i class="las la-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @else
        <div class="alert alert-danger col-xs-12 col-md-12" role="alert">You are no taking any classes.</div>
    @endif
@endsection




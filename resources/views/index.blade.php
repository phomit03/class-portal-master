<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="ClassPortal">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}" />
    <title>ClassPortal</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <script type="text/javascript" src="{{ asset('js/defer.js') }}"></script>
    <script>
        Defer.css('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap', 'google-font');
        Defer.css('https://faistatic.edunext.vn/styles/line-awesome.css?v=824a36fc-e5da-4a17-8a8a-953ec5a87cd4', 'line-awesome-font');
        Defer.css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', 'select2-css');
        Defer.css('https://faistatic.edunext.vn/styles/jquery-ui.css?v=824a36fc-e5da-4a17-8a8a-953ec5a87cd4', 'jquery-ui-css');
    </script>
    <script type="text/javascript" defer src="{{ asset('js/form.js') }}"></script>

</head>

<body class="landing fu-site">

    <!---Site Header-->
    <header id="site-header" class="site-header">
        <div class="container site-header-container">

            <div id="site-logo" class="site-logo">
                <a href="/" rel="home"><img src="{{ asset('uploads/logo/logo1.png') }}" class="mg-r-15" alt="logo"></a>
            </div>
            <ul id="header-account" class="header-account none-list">
                <li class="user-section">
                    <div class="user-acc">
                        <a href="{{ route('login') }}" class="btn btn-outline-main-v4 btn-small-v4 btn-login-v4" title="Login">Login</a>
                    </div>
                    <div class="user-acc">
                        <a href="{{ route('register') }}" class="btn btn-outline-main-v4 btn-small-v4 btn-login-v4" title="Register">Register</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!---End Site Header-->

    <!--main-->
    <main id="site-main" class="site-main">
        <!-- TOP HEAD -->
        <section id="top-head" class="landing-section gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7  mg-b-20">
                        <div class="wrap-content">
                            <h1 class="title-section fs-32 mg-b-10">Social Constructive Learning</h1>
                            <p class="fs-18 mg-b-15">Construct knowledge and personalize the learning way to empower learners&#x27; full potential.</p>
                            <a href="/home" class="signup-link btn  btn-main-v4 btn-large-v4 ttf-none" title="Join now">Join now</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-5  mg-b-20">
                        <img src="{{ asset('uploads/landing/landing-pc-1.png') }}" alt="Banner EduNext" />
                    </div>
                </div>
            </div>
        </section>
        <section id="why-constructive" class="landing-section">
            <div class="container">
                <h2 class="title-section fs-32 mg-b-30 align-center">Personalization In Learning</h2>
                <div class="row">
                    <div class="col-12 col-md-7  mg-b-20">
                        <img src="{{ asset('uploads/landing/landing-pc-2.png') }}" alt=">Personalization In Learning" />
                    </div>
                    <div class="col-12 col-md-5  mg-b-20">
                        <div class="wrap-content">
                            <p>Self-paced learning means you are in control of what you learn and when you learn it.</p>
                            <p>Construct knowledge and discuss in groups with high quality mentors and friends.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="persionalized-learning" class="landing-section gray-bg">
            <div class="container">
                <h2 class="title-section fs-32 mg-b-30 align-center">Comprehensive Constructive Platform</h2>
                <div class="row">
                    <div class="col-12 col-md-7  mg-b-20">
                        <ul class="wrap-content none-list pd-0">
                            <li class="mg-b-30 hidden">
                                <img src="{{ asset('uploads/landing/landing-pc-3-1.png') }}" alt="Learn at the individual pace" />
                                <div class="right-list-content pd-l-15">
                                    <h3 class="fs-20 mg-b-5">Learn at the individual pace</h3>
                                    <p class="mg-0">Personalized learning involves learners in deciding their learning process. Thus, learners can level up according to their strengths and weaknesses.</p>
                                </div>
                            </li>
                            <li class="mg-b-30">
                                <img src="{{ asset('uploads/landing/landing-pc-3-2.png') }}" alt="Provide constructive teaching tools" />
                                <div class="right-list-content pd-l-15">
                                    <h3 class="fs-20 mg-b-5">Provide constructive teaching tools</h3>
                                    <p class="mg-0">Using a variety of tools provided on the ClassPortal for constructive teaching and learning.</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('uploads/landing/landing-pc-3-3.png') }}" alt="Group discussion 24/7" />
                                <div class="right-list-content pd-l-15">
                                    <h3 class="fs-20 mg-b-5">Group discussion 24/7</h3>
                                    <p class="mg-0">Discuss with friends and mentors anytime, anywhere.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-5 wrap-pic mg-b-20">
                        <img src="{{ asset('uploads/landing/landing-pc-3.png') }}" alt="Persionalized Learning" />
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--end-main-->

    <!--footer-->
    @include('layouts.footer')
    <!--end-footer-->

</body>
</html>

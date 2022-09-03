<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="ClassPortal">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}" />
    <title>About Us</title>

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
@if (Auth::user())
    @include('layouts.navigation')
@else
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
@endif
<!---End Site Header-->

<!--main-->
<main id="site-main" class="site-main">
    <div class="container" style="padding:80px 15px;">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h2 style="font-weight:500;font-size:32px;margin-bottom:10px;color:#000">WHO WE ARE?</h2>
                <p>Class Portal is an online training platform that provides learners with the Personalized learning experience. There, learning is compatible with their competencies and qualifications, helping to explore and develop personal abilities by constructive learning method based on the social constructivist theory.</p>
                <h2 style="        font-weight: 500;
        font-size: 32px;
        margin-bottom: 10px;color:#000">
                    VISION
                </h2>
                <p>We believe that learning is a process of self-exploration and self-awareness. In that journey, Class Portal aspires to become a leading social constructivist learning platform in Vietnam, reaching out to the world, giving learners the opportunity to accumulate knowledge, create values and change our world.</p>
                <h2 style="font-weight: 500;
        font-size: 32px;
        margin-bottom: 10px;color:#000">
                    MISSIONS
                </h2>
                <p>Following the motto "knowledge is created in the process of personal exploration of the world", there are suitable constructivist learning experiences for learners as group study with friends, experts and mentors so that they can break their own limits.</p>
            </div>
            <div class="col-12 col-lg-6">
                <h2 style="        font-weight: 500;
        font-size: 32px;
        margin-bottom: 10px;color:#000">
                    VALUES
                </h2>
                <h3 class="mg-b-10 fs-22">Exploration</h3>
                <p>We help learners participate in many learning activities, freely give opinions in groups and in the Class Portal community without any restrictions.</p>
                <h3 class="mg-b-10 fs-22">Personalization</h3>
                <p>Learning space is not limited to content, diverse in topics, suggesting courses to suit learners’ abilities and interests.</p>
                <h3 class="mg-b-10 fs-22">Connection</h3>
                <p>
                    Our completely online space allows learners to connect with friends, groups and the community in courses, with the help of chat and livestream tools.
                </p>
                <h3 class="mg-b-10 fs-22">
                    Direction
                </h3>
                <p>We strive to be at the forefront of changing education - and transforming the lives of our learners, our partner's businesses, and the world in the process.</p>
            </div>
        </div>
    </div>
</main>
<!--end-main-->

<!--footer-->
@include('layouts.footer')
<!--end-footer-->

</body>
</html>

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


    <!--our-team-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .row.heading h2 {
            color: black;
            font-size: 52.52px;
            line-height: 95px;
            font-weight: 400;
            text-align: center;
            text-transform: uppercase;
        }
        .row, .follow-us{
            margin:0;
            padding:0;
            list-style:none;
        }
        .heading.heading-icon {
            display: block;
        }
        .padding-lg {
            display: block;
            padding-top: 60px;
            padding-bottom: 60px;
        }
        .practice-area.padding-lg {
            padding-bottom: 55px;
            padding-top: 55px;
        }
        .practice-area .inner{
            border:1px solid #999999;
            text-align:center;
            margin-bottom:28px;
            padding:40px 25px;
        }
        .our-webcoderskull .cnt-block:hover {
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
            border: 0;
        }
        .practice-area .inner h3{
            color:#3c3c3c;
            font-size:24px;
            font-weight:500;
            font-family: 'Poppins', sans-serif;
            padding: 10px 0;
        }
        .practice-area .inner p{
            font-size:14px;
            line-height:22px;
            font-weight:400;
        }
        .practice-area .inner img{
            display:inline-block;
        }

        .our-webcoderskull .cnt-block{
            float:left;
            width:100%;
            background:#fff;
            padding:30px 20px;
            text-align:center;
            border:2px solid #d5d5d5;
            margin: 0 0 28px;
        }
        .our-webcoderskull .cnt-block figure{
            width:148px;
            height:148px;
            border-radius:100%;
            display:inline-block;
            margin-bottom: 15px;
        }
        .our-webcoderskull .cnt-block img{
            width:148px;
            height:148px;
            border-radius:100%;
        }
        .our-webcoderskull .cnt-block h3{
            color:#2a2a2a;
            font-size:20px;
            font-weight:500;
            padding:6px 0;
            text-transform:uppercase;
        }
        .our-webcoderskull .cnt-block h3 a{
            text-decoration:none;
            color:#2a2a2a;
        }
        .our-webcoderskull .cnt-block h3 a:hover{
            color:#337ab7;
        }
        .our-webcoderskull .cnt-block p{
            color:#2a2a2a;
            font-size:13px;
            line-height:20px;
            font-weight:400;
        }
        .our-webcoderskull .cnt-block .follow-us{
            margin:20px 0 0;
        }
        .our-webcoderskull .cnt-block .follow-us li{
            display:inline-block;
            width:auto;
            margin:0 5px;
        }
        .our-webcoderskull .cnt-block .follow-us li .fa{
            font-size:24px;
            color:#767676;
        }
        .our-webcoderskull .cnt-block .follow-us li .fa:hover{
            color:#025a8e;
        }

        .fa {
            padding: 0 5px ;
        }
    </style>

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
    <div class="container" style="padding:60px 15px 20px;">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h2 style="font-weight:500;font-size:32px;margin-bottom:10px;color:#000">WHO ARE WE?</h2>
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

        <!--our-team-->
        <section class="our-webcoderskull padding-lg">
            <div class="container">
                <div class="row heading heading-icon">
                    <h2>-Our Technical Team-</h2>
                    <hr style="margin-bottom:50px">
                </div>
                <ul class="row">
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight" style="height: 349px;">
                            <figure><img src="http://www.webcoderskull.com/img/team4.png" class="img-responsive" alt=""></figure>
                            <h3><a href="https://github.com/phomit03">Nguyen Xuan Thao</a></h3>
                            <b>Team Leader</b>
                            <p>FPT Aptech Student</p>

                            <ul class="follow-us clearfix">
                                <li><a href="https://www.facebook.com/pphorm.291/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/ItPhom"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/nguyen-xuan-thao-aptech-hn-5167a3221/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight" style="height: 349px;">
                            <figure><img src="https://i.pinimg.com/564x/fa/73/34/fa733470fdc612f6b8945c3cd681d3b1.jpg" class="img-responsive" alt=""></figure>
                            <h3><a href="https://github.com/thuongbong">Khong Thi Thuong</a></h3>
                            <b>Team Leader</b>
                            <p>FPT Aptech Student</p>
                            <ul class="follow-us clearfix">
                                <li><a href="https://www.facebook.com/thuong.bong.1407"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight" style="height: 349px;">
                            <figure><img src="http://www.webcoderskull.com/img/team1.png" class="img-responsive" alt=""></figure>
                            <h3><a href="https://github.com/Nhatanhn36">Nguyen Nhat Anh</a></h3>
                            <b>Team Member</b>
                            <p>FPT Aptech Student</p>
                            <ul class="follow-us clearfix">
                                <li><a href="https://www.facebook.com/profile.php?id=100013598954941"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="col-12 col-md-6 col-lg-3">
                        <div class="cnt-block equal-hight" style="height: 349px;">
                            <figure><img src="http://www.webcoderskull.com/img/team2.png" class="img-responsive" alt=""></figure>
                            <h3><a href="http://www.webcoderskull.com/">Do Quang Minh</a></h3>
                            <b>Team Member</b>
                            <p>FPT Aptech Student</p>
                            <ul class="follow-us clearfix">
                                <li><a href="https://www.facebook.com/profile.php?id=100071814920764"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!--end our-team-->
    </div>
</main>
<!--end-main-->

<!--footer-->
@include('layouts.footer')
<!--end-footer-->

</body>
</html>

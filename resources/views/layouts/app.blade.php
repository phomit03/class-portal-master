<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--xử lí lỗi link dẫn 1 nguồn.-->
    <base href="/"/>

    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}" />

    <title>ClassPortal - @yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <script type="text/javascript" src="{{ asset('js/defer.js') }}"></script>
    <script>
        Defer.css('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap', 'google-font');
        Defer.css('https://faistatic.edunext.vn/styles/line-awesome.css?v=824a36fc-e5da-4a17-8a8a-953ec5a87cd4', 'line-awesome-font');
        Defer.css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', 'select2-css');
        Defer.css('https://faistatic.edunext.vn/styles/jquery-ui.css?v=824a36fc-e5da-4a17-8a8a-953ec5a87cd4', 'jquery-ui-css');
    </script>
    <script type="text/javascript" defer src="{{ asset('js/form.js') }}"></script>
</head>

  <body>
    <!-- Include the navigation -->
    @include('layouts.navigation')

    <!-- main content -->
    <main id="site-main" class="site-main" style="padding: 30px 60px 45px;">
        <div class="container wrap-list-classes">
            <div class="edn-tabs">
                <div id="tab-home-page" class="group-head-tab-control">
                    @if(Auth::user()->role == 'teacher')
                        <div class="page-header" style="margin-bottom: 20px">
                            <h2 class="text-right">@yield('page-header')</h2>
                        </div>
                    @endif
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main content -->

    <!--footer-->
    @include('layouts.footer')
    <!--end-footer-->

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- JavaScript Files That May Be Needed For Specific Purposes -->
    @stack('scripts')
  </body>
</html>

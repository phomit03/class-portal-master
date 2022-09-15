<!---Site Header-->
<header id="site-header" class="site-header">
    <div class="container site-header-container">

        <div id="site-logo" class="site-logo">
            <a href="{{ url('/home') }}" rel="home"><img src="{{ asset('uploads/logo/logo1.png') }}" class="mg-r-15" alt="logo"></a>
        </div>
        <div class="wrap-site-nav">
            <input type="checkbox" id="mobile-menu-cb" name="mobile-menu-cb">
            <label class="hamburger-button" for="mobile-menu-cb">
                <span class="hamburger-icon"></span>
            </label>
            <label class="hamburger-menu-mask la la-times" for="mobile-menu-cb"></label>
            <nav id="site-nav" class="site-nav">
                <ul class="site-menu none-list heading-font">
                    @if (Auth::user())
                        <li class="menu-item home {{request()->segment(1) == 'home' ? 'active' : '' }}">
                            <a class="" href="{{ url('/home') }}" title="Home">
                                <i class="las la-home"></i>  Home
                            </a>
                        </li>
                        <!-- Display appropriate links based on the user's role -->
                        @if (Auth::user()->role == 'teacher')
                            <li class="menu-item home {{request()->segment(1) == 'class' ? 'active' : '' }}">
                                <a class="" href="{{ url('/class/create') }}" title="Add Class">
                                    <i class="las la-home"></i>  Add Class
                                </a>
                            </li>
                        @endif
                        <li class="menu-item list-slots {{request()->segment(1) == 'list-subject' ? 'active' : '' }}">
                            <a class="" href="{{url('/list-subject')}}" title="Subjects">
                                <i class="las la-book"></i> Subjects
                            </a>
                        </li>
                        <li class="menu-item list-assignments {{request()->segment(1) == 'list-assignment' ? 'active' : '' }}">
                            <a class="" href="/list-assignment" title="Assignments">
                                <i class="las la-book"></i> Assignments
                            </a>
                        </li>
                        <li class="menu-item user-guide-link">
                            <a href="" data-toggle="modal" data-target="#userSupportModal" title="Support">
                                <i class="la la-support"></i> Support
                            </a>
                        </li>
                        <li class="menu-item user-guide-link">
                            <a class="" href="https://faistatic.edunext.vn/assets/attachments/Huong_dan_KTXH_tren_EduNext_Sp22_Sinh_Vien.pdf" target="_blank" title="User Guide"><i class="las la-school"></i> User Guide</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <ul id="header-account" class="header-account none-list">
            <li class="user-support-link">
                <a class="support" data-toggle="modal" data-target="#userSupportModal" title="Support">
                    <h3 class="fs-16 mg-b-0 mg-r-4">Support</h3>
                </a>
            </li>
            <li class="user-guide-link">
                <a class="" href="https://faistatic.edunext.vn/assets/attachments/Huong_dan_KTXH_tren_EduNext_Sp22_Sinh_Vien.pdf" target="_blank" title="User Guide">User Guide</a>
            </li>
            <li class="user-chat {{request()->segment(1) == 'message' ? 'active' : '' }}">
                <div class="chat-icon">
                    <a href="{{ url('/message') }}">
                        <span class="total-message"></span>
                        <i class="las la-comments"></i> Chat
                    </a>
                </div>
            </li>
            <li class="user-notify">
                <input type="checkbox" id="user-notify-cb" class="hidden" />
                <div class="overlay-notify"><i class="las la-times"></i></div>
                <label for="user-notify-cb" class="account-notify has-notify"><i class="la la-bell"></i><span class="total-notify" style="display:none"></span></label>
                <div class="wrap-user-notify-content">
                    <div class="heading-user-notify">
                        <div class="wrap-actions text-semibold text-uppercase">
                            <a href="#" class="not-read" title="Unread">Unread</a>
                            <a href="#" class="all-notify" title="All">All</a>
                        </div>
                    </div>
                    <ul class="list-user-notify">
                    </ul>
                    <span class="notify-load-more" style="display:none">Load more</span>
                </div>
            </li>
            <li class="user-section">
                <div class="user-acc">
                    <input style="display:none;" type="checkbox" id="toggle-user-block" name="toggle-user-block" />
                    <label class="label-user" for="toggle-user-block">
                        <span class="avatar-place-holder v4">
                            <img src="{{(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('uploads/avatar/user-default.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                        </span>
                    </label>
                    <ul class="user-action-box ui-v4">
                        <li class="overlay">
                            <i class="la la-times"></i>
                        </li>
                        <li>
                            <a href="{{ url('/profile') }}" title="{{ Auth::user()->email }}">
                                <div class="user-box">
                                    <span class="avatar-place-holder in-action-box">
                                        <img src="{{(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('uploads/avatar/user-default.png') }}"
                                             alt class="w-px-40 h-auto rounded-circle"
                                        />
                                    </span>
                                    <div class="right">
                                        <p class="user-name">
                                            <span>{{ Auth::user()->email }}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="break-line-item"></li>
                        <li>
                            <a class="item logout-site" href="" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="la la-sign-in-alt"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                @csrf
                                @method("post")
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>
<!---End Site Header-->

<!--form-support-->
<div class="modal fade" id="userSupportModal" role="dialog" tabindex="-1" aria-labelledby="supportModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Phone number: </label>
                        <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Enter your phone here">
                        @if ($errors->has('phone'))
                            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email here">
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description: </label>
                        <textarea rows="5" class="form-control" name="describe" placeholder="Enter your description here">{{ old('describe') }}</textarea>
                        @if ($errors->has('describe'))
                            <span class="help-block"><strong>{{ $errors->first('describe') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Attachments (if possible): </label>
                        <input class="custom-file-input" type="file" name="attachments" value="{{ old('attachments') }}" placeholder="Enter your attachments here">
                        @if ($errors->has('attachments'))
                            <span class="help-block"><strong>{{ $errors->first('attachments') }}</strong></span>
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span class="info-contact">In case of urgent support, please contact us via:<br>
                    <span style="color: #007bff;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        +84 123 456 789
                    </span>
                </span>
                <button type="button" value="Accept" class="btn btn-primary" style="width: 120px">Submit</button>
            </div>
        </div>
    </div>
</div>



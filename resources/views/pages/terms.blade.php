<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="ClassPortal">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}" />
    <title>Terms</title>

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

    <section class="main">
        <div class="container terms">
            <div class="title text-center">
                <h1>Class Portal Terms of Use</h1>
                <h2>Legal Information & Notices</h2>
            </div>
            <span>
            Effective September 20, 2022
        </span>
            <div class="mg-t-10 text-justify">
                <p class="font-italic text-bold ">
                    Please note that your use of and access to our services (defined below) are subject to the following terms; if you do not agree to all of the following, you may not use or access the services in any manner.
                </p>
                <p>
                    Welcome to Class Portal.vn. Please read on to learn the rules and restrictions that govern your use of our website, products, and services (the “Services”). The Services are owned and operated by Class Portal. If you have any questions, comments, or concerns regarding these terms or the Services, please contact us at <a href="#">classportal@support.com</a>, or
                    Detect Tower, No.8 Ton That Thuyet Street, Dich Vong Ward, Cau Giay District, Hanoi, Vietnam.
                </p>
                <p>
                    When we refer to “you” or “your”, we’re talking about you (including, if you are entering into these terms on behalf of third party, such third party). When we refer to “us”, “we”, “our”, or “Class Portal”, we’re talking about the Services and our company (including its officers, directors, investors, agents, representatives, and employees). These Terms of Use (the “Terms”) are a binding contract between you and Class Portal. You must agree to and accept all of the applicable Terms, or you don’t have the right to use the Services. These terms also include the provisions of the Privacy Policy and Copyright Dispute Policy.
                </p>
                <p class="text-semibold gray-02 text-uppercase">
                    AGAIN, PLEASE READ THESE TERMS CAREFULLY TO ENSURE THAT YOU UNDERSTAND EACH PROVISION. THESE TERMS CONTAIN A MANDATORY INDIVIDUAL ARBITRATION AND CLASS ACTION/JURY TRIAL WAIVER PROVISION THAT REQUIRES THE USE OF ARBITRATION ON AN INDIVIDUAL BASIS TO RESOLVE DISPUTES, RATHER THAN JURY TRIALS OR CLASS ACTIONS.
                </p>
                <h2 class="text-bold ">
                    Account Information Access
                </h2>
                <p>
                    The errors or omissions associated with Your Content. You represent and agree to all of the following and acknowledge We are explicitly relying on such representations and agreement with regard to Your Content and use of Content made available on <b>Class Portal</b>:
                </p>
                <p>

                </p>
                <h2 class="text-bold ">
                    Third Party Websites and Services
                </h2>
                <p>
                    Class Portal may include links to third party web sites or services (“Linked Sites”) solely as a convenience. We do not endorse any such Linked Sites or the information, material, products, or services contained on other Linked Sites or accessible through other Linked Sites. Furthermore, We make no express or implied warranties with regard to the information, material, products, or services that are contained on or accessible through Linked Sites. Access and use of Linked Sites, including the information, material, products, and services on Linked Sites or available through Linked Sites, is solely at Your own risk.
                </p>
                <h2 class="text-bold ">
                    Indemnification
                </h2>
                <p>
                    You agree to indemnify and hold Class Portal, its affiliated companies, suppliers, partners, officers, contractors and employees harmless from any claim or demand made by any third party due to or arising out of Your actions in using Class Portal, a claim that You, or any third party using Your Credentials, infringed any intellectual property or other right of any person or organization using Class Portal or the violation of these Terms by You or any third party using Your Credentials. Class Portal reserves the right, at our own expense, to assume the exclusive defense and control of any matter for which You are required to indemnify Us, and You agree to cooperate with Our defense of these claims. This indemnity shall not apply if a third party uses Your Credentials due to an act or omission of Class Portal.
                </p>
                <h2 class="text-bold ">
                    Miscellaneous
                </h2>
                <ul>
                    <li>
                        These Terms will remain in full force and effect while You use Class Portal. Those terms that can continue to operate after You stop using Class Portal (including without limitation Your Content license to Us and the general terms in this Section), will survive after You stop using Class Portal.
                    </li>
                    <li>
                        You agree that regardless of any statute of law to the contrary or any claim or cause of action arising out of or related to use of Class Portal or these Terms must be filed within one (1) year after such claim or cause of action arose or be forever barred.
                    </li>
                    <li>
                        You agree that We may provide You with notices, including those regarding changes to these Terms, via notification through Class Portal's notification functionality.
                    </li>
                    <li>
                        Class Portal is available to person who has capacity for civil acts of individuals. By using Class Portal, you present and warrant that You are of legal age to form a binding contract in Your place of residence, and are not a person barred from receiving services under the laws of the Vietnam or other applicable jurisdiction. We reserve the right to refuse registration of, or cancel, any Class Portal Account or access to Class Portal by anyone in Our reasonable discretion, at any time. Class Portal Accounts will be accessed through a username and password that You will create (Your “Credentials”). Your Credentials are solely for Your use and must not be shared. Each Class Portal online community (each “Class Portaler”), needs to have his or her own Class Portal Account and Credentials. You agree that Your Credentials and information You provide upon registration of Your Class Portal Account and at all other times will be true, accurate, current, and complete. You are responsible for maintaining the confidentiality of Credential, and for all activities that occur under Your Class Portal Account. You agree to immediately notify Us of any unauthorized use of Your Class Portal Account, Credentials, or any other breach of security. You agree that We will not be liable for any loss or damage arising from Your failure to provide Us with accurate information or to keep Your Credentials secure.
                    </li>
                </ul>
                <h2 class="text-bold ">
                    Content
                </h2>
                <ul>
                    <li>
                        Class Portal provides certain features which enable Class Portalers to submit, post, and share data, text, software, graphics, messages or other material (“Content”). Content that Class Portalers submit, post or share is subject to Terms. Content that You own and post on or through Class Portal belongs to You and You may use it in any way, except as prohibited by applicable law or regulations. By using Class Portal, You are granting Us permission to use the Content as described in these Terms.
                    </li>
                    <li>
                        By using Class Portal You are granting Us a non¬exclusive, worldwide, royalty¬free, fully paid¬up, sublicenseable, irrevocable and transferable right and license to use, host, store, reproduce, create derivative works of, distribute, modify, display, and communicate Your Content. If You post Content on or through Class Portal, You represent and warrant that You have the right to post the Content and to grant the above rights to Us. This license continues even if You terminate Your Class Portal Account and/or stop using Class Portal.
                    </li>
                    <li>
                        You understand that by posting Your Content that You are responsible for Your Content and any Content that You create, transmit or display while using Class Portal, and for any consequences thereof. You further agree that under no circumstances will We be liable for
                    </li>
                    <li>
                        You understand that by posting Your Content that You are responsible for Your Content and any Content that You create, transmit or display while using Class Portal, and for any consequences thereof. You further agree that under no circumstances will We be liable for:
                        <p></p>
                        <p>
                            You own, or have the necessary licenses, rights, consents, and permissions to use and authorize Us to use all patent, trademark, copyright, or other proprietary rights in and to Your Content to enable inclusion and use of Your Content in the manner contemplated by these Terms, and to grant the rights and license set forth above.
                        </p>
                        <p>
                            Your Content, Our use of Your Content pursuant to these Terms, and exercise of the license rights set forth above, do not and will not:
                        <ul>
                            <li>
                                Infringe, violate, or misappropriate any third party right, including any copyright, trademark, patent, trade secret, moral right, Privacy Right, right of publicity, or any other intellectual property or proprietary right
                            </li>
                            <li>
                                Slander, defame, libel, or invade the right of privacy, publicity, or other property rights of any other person
                            </li>
                            <li>
                                Violate any applicable law or regulation.
                            </li>
                        </ul>
                        </p>
                    </li>
                    <li>
                        If You provide Us with any comments, bug reports, feedback, or modifications proposed or suggested by You (“Feedback”), We shall have the right to use such Feedback at Our discretion, including, but not limited to the incorporation of such suggested changes into Class Portal and/or our other products and services. You hereby grant to Us a perpetual, irrevocable, non¬exclusive license under all rights necessary to incorporate and use Your Feedback for any purpose.
                    </li>
                </ul>
                <h2 class="text-bold ">
                    Code of Conduct
                </h2>
                <p>
                    We have the right, but not the obligation, to remove or block Content from Class Portal that We determine in Our reasonable discretion to be in violation of these Terms, to be unlawful, offensive, threatening, libelous, defamatory, obscene or otherwise objectionable, that violates any party's intellectual property or that is detrimental to the quality or intended spirit of Class Portal. We also have the right, but not the obligation, to limit or revoke the use privileges of the Class Portal Account of any Class Portaler who posts such Content or engages in such behavior.
                </p>
                <p>
                    Sharing Class Portal Accounts or Credentials with any third party or encouraging any other Hacker to do so.
                </p>
                <h2 class="text-bold ">
                    Termination
                </h2>
                <ul style="list-style-type: disc">
                    <li>
                        We, in Our reasonable discretion may terminate Your Class Portal Account and/or Credentials and remove and discard any Content within Class Portal if We believe that You have violated or acted inconsistently with the letter and spirit of these Terms
                    </li>
                    <li>
                        You may terminate Your Class Portal Account and Your right to use Class Portal at any time and for any reason or no reason, by contacting Us user support at <a href="#">classportal@support.com</a> However, if You have a separate agreement with Us which has conflicting terms regarding termination, those terms shall take precedence.
                    </li>
                    <li>
                        After cancellation or termination of Your Class Portal Account for any reason, You will no longer have access to Your Class Portal Account and all information and Content in Your Class Portal Account or that You have stored on Class Portal may be, but is not required to be deleted by Us. We will have no liability for information or Content that is deleted due to the cancellation or termination of Your Class Portal Account for any reason.
                    </li>
                </ul>
                <h2 class="text-bold ">
                    Ownership Proprietary Rights
                </h2>
                <p>
                    Class Portal is owned and operated by Class Portal. The visual interfaces, graphics, design, compilation, information, computer code, products, software (including any downloadable software), services, and all other elements of Class Portal provided by Class Portal (“Materials”) are protected by Vietnam copyright, trade dress, patent, and trademark laws, international conventions, and all other relevant intellectual property and proprietary rights, and applicable laws. Except for any third party content or Content uploaded by You, all Materials are the copyrighted property of Class Portal or its subsidiaries or affiliated companies and/or third party licensors. All trademarks, service marks, and trade names are proprietary to Class Portal or its affiliates and/or third party licensors. Except as expressly authorized by Class Portal, You agree not to sell, license, distribute, copy, modify, publicly perform or display, transmit, publish, edit, adapt, create derivative works from, or otherwise make unauthorized use of the Materials.
                </p>
                <ul>
                    <li>
                        Our failure to exercise or enforce any right or provision of these Terms shall not constitute a waiver of such right or provision. If any provision of these Terms is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties’ intentions as reflected in the provision, and the other provisions of these Terms shall remain in full force and effect.
                    </li>
                    <li>
                        You may not assign Your Class Portal Account or any rights and licenses granted hereunder and such any assignment by You will be null and void.
                    </li>
                    <li>
                        All sections of these Terms that by their respective nature should survive the cancellation or termination of these Terms shall survive the termination or cancellation of these Terms. You agree that breach of these provisions will cause irreparable harm and that accordingly We may seek injunctive relief in addition to any other legal remedies under these Terms at law or equity.
                    </li>
                    <li>
                        You agree that except as otherwise expressly provided for in these Terms, there shall be no third party beneficiaries to the Terms.
                    </li>
                </ul>
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

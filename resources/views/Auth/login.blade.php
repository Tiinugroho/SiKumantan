<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Halaman Login</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="{{asset('fn/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('fn/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('fn/css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('fn/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('fn/css/styles.css')}}" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('fn/images/favicon.png')}}">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navigation -->
    <!-- end of navbar -->
    <!-- end of navigation -->
    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>You don't have a password? Then please <a class="white" href="{{route('register')}}">Sign Up</a>
                    </p>
                    <!-- Sign Up Form -->
                    <div class="form-container">
                        @if(session('error'))
                            <p style="color:red;">{{ session('error') }}</p>
                        @endif

                        <form action="{{ route('login.proses') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="lemail" name="email" required>
                                <label class="label-control" for="lemail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="lpassword" name="password"
                                    required>
                                <label class="label-control" for="lpassword">Password</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">LOG IN</button>
                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>

                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first() }}</p>
                        @endif
                    </div>
                    <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Scripts -->
    <script src="{{asset('fn/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{asset('fn/js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{asset('fn/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
    <script src="{{asset('fn/js/jquery.easing.min.js')}}"></script>
    <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{asset('fn/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{asset('fn/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{asset('fn/js/validator.min.js')}}"></script>
    <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{asset('fn/js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>

</html>
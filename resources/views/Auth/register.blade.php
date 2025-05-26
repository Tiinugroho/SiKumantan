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
    <title>Sign Up - Tivo - SaaS App HTML Landing Page Template</title>

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


    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Register</h1>
                    <p>Fill out the form below to sign up for Tivo. Already signed up? Then just <a class="white"
                            href="{{route('login')}}">Log In</a></p>
                    <!-- Sign Up Form -->
                    <div class="form-container">
                        <form action="{{ url('/register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h2>Form Register</h2>

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                    name="nik" required placeholder="Masukkan NIK" maxlength="16"
                                    value="{{ old('nik') }}"
                                    oninput="this.value=this.value.replace(/[^0-9]/g, '').slice(0,16)"
                                    title="NIK harus terdiri dari 16 digit angka">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" required placeholder="Masukkan Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" required placeholder="Masukkan Nama" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo_ktp">Foto KTP</label>
                                <input type="file" class="form-control @error('photo_ktp') is-invalid @enderror"
                                    id="photo_ktp" name="photo_ktp" required accept="image/*">
                                @error('photo_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required placeholder="Masukkan Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required placeholder="Konfirmasi Password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>

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
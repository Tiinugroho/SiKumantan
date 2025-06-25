<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags -->
    <meta property="og:site_name" content="" />
    <meta property="og:site" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>@yield('title', 'Tivo - SaaS App HTML Landing Page Template')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('fn/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('fn/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('fn/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('fn/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('fn/css/styles.css') }}" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blue: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                        },
                        purple: {
                            50: '#faf5ff',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7e22ce',
                        }
                    }
                }
            }
        }
    </script>
    

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('fn/images/logokampar.png') }}">
    
    @yield('styles')
</head>
<body>
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('fn/js/jquery.min.js') }}"></script>
    <script src="{{ asset('fn/js/popper.min.js') }}"></script>
    <script src="{{ asset('fn/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fn/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('fn/js/swiper.min.js') }}"></script>
    <script src="{{ asset('fn/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('fn/js/validator.min.js') }}"></script>
    <script src="{{ asset('fn/js/scripts.js') }}"></script>
    
    <script>
        // Toggle password visibility
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
        
        // File upload preview
        document.getElementById('photo_ktp').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                document.getElementById('file-name').textContent = fileName;
                document.getElementById('file-selected').classList.remove('hidden');
            } else {
                document.getElementById('file-selected').classList.add('hidden');
            }
        });
        
        // Drag and drop functionality
        const dropArea = document.getElementById('ktp-upload-container');
        const fileInput = document.getElementById('photo_ktp');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            dropArea.classList.add('border-blue-500', 'bg-blue-50');
        }
        
        function unhighlight() {
            dropArea.classList.remove('border-blue-500', 'bg-blue-50');
        }
        
        dropArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length) {
                fileInput.files = files;
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        }
    </script>
    
    @yield('scripts')
</body>
</html>

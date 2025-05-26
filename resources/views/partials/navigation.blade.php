<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="">
            <img src="{{ asset('fn/images/logokampar.png') }}" alt="alternative"
                style="max-width: 70%; height: auto; display: block; margin: 0 auto;">
        </a>
        <h2 class="deskripsi-desa"
            style="font-size: 32px; font-weight: bold; color: #000000; text-align: center; margin: 20px 0; font-family: 'Arial', sans-serif;">
            DESA KUMANTAN
        </h2>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">HOME<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#layanan">LAYANAN E-SURAT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#features">PROFILE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#details">DETAILS</a>
                </li>
            </ul>

            <span class="nav-item">
                @if (Auth::check())
                    <div>
                        <div class="nav-item dropdown">
                            <a class="btn-outline-sm dropdown-toggle" href="#">
                                Hy, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow rounded w-100">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cog mr-2"></i> Setting
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </div>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a class="btn-outline-sm" href="{{ route('login') }}">LOG IN</a>
                @endif
            </span>
        </div>
    </div>
</nav>
<!-- end of navigation -->
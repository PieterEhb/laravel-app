<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-dark">
            <div class="container">
                <a class="navbar-brand text-white fw-bold fs-2" href="{{ url('/') }}">
                    <img src="/storage/app/public/images/factorio-logo.png" style="height: 40px;" alt="Factorio">Fan
                </a>

                <a class="navbar-brand text-white" href="{{ route('news.index') }}">
                     News
                </a>
                <a class="navbar-brand text-white" href="{{ route('speedrun.index') }}">
                     Speedruns
                </a>
                <a class="navbar-brand text-white" href="{{ route('speedrun.create') }}">
                     upload Speedrun
                </a>
                <a class="navbar-brand text-white" href="{{ route('faq.index') }}">
                     FAQ
                </a>
                <a class="navbar-brand text-white" href="{{ route('contactform.create') }}">
                     Contact us
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @php
                            $user = Auth::user()
                        @endphp
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if ($user->userinfo != null)
                                    <img src="/storage/app/public/avatarImages/{{ $user->userinfo->image }}" alt="{{ $user->name}}" height="40px"> 
                                    @else
                                    {{ $user->name }}
                                    @endif

                                </a>
                                <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">

                                    @if ($user->is_admin)
                                    <a class="dropdown-item bg-dark text-white" href="{{ route('adminIndex') }}">
                                        Admin
                                    </a>
                                    @endif                                     

                                <a class="dropdown-item bg-dark text-white" href="{{ route('user.profile', Auth::user()->id) }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item bg-dark text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

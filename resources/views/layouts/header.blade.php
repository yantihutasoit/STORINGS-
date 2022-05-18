<header style="background-color:#22946e;">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{ url('/') }}" data-dark-logo="">
                    <!-- <h2 class="mt-3" style="color: white;">Storings</h2> -->
                </a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">

                <ul>
                    @guest
                    <li><a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
                    <li><a class="nav-link text-light" href="{{ url('/index2') }}">Beranda</a></li>
                    @can('role-edit')
                    <li><a class="nav-link text-light" href="{{ route('users.index') }}">Pengguna</a></li>
                    <!-- <li><a class="nav-link text-light" href="{{ route('roles.index') }}">Roles</a></li> -->
                    @endcan
                    @can('Nilai-list')
                    <li><a class="nav-link text-light" href="{{ route('Siswa.index') }}">Data Siswa</a></li>
                    <li><a class="nav-link text-light" href="{{ route('Nilai.index') }}">Nilai</a></li>
                    @endcan
                    @can('role-edit')
                    <li><a class="nav-link text-light" href="{{ route('email.send_email') }}">Kirim Email</a></li>
                    @endcan
                    @can('Nilai-list')
                    <li><a class="nav-link text-light" href="{{route('changePassword')}}">Ganti Password</a></li>
                    @endcan
                    @can('role-edit')
                    <li><a class="nav-link text-light" href="{{ route('Sekolah.index') }}">Pengaturan Info</a></li>
                    @endcan
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg shadow py-3 sticky-top" style="background-color: #238E68;">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="./frontend/img/Logo23.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="/">Home</a>
                        </li>
                            @if(Auth::user()->kategori == 'petani' || Auth::user()->kategori == 'admin' )
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/product/create">Jual Hasil Panen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/modalin">Modalin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/modal">Modalku</a>
                                </li>
                            @endif
                            @if(Auth::user()->kategori == 'pembeli' || Auth::user()->kategori == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/product">Beli Hasil Panen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/transaction">Transaksi</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="/konsultasi">Konsultasikan</a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="#location">Location</a>
                        </li>
                        @endif
                    </ul>

                    <div class="btn-group">
                        @if (Auth::check())
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                            {{Auth::user()->name}}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                @if(Auth::user()->kategori == 'admin')
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                @endif
                                {{-- <li><a class="dropdown-item" href="/logout">Logout</a></li> --}}
                                <li><form method="POST" action="{{ route('logout')}}" >@csrf <button class="btn btn-light dropdown-item" type="submit">Logout</button></form></li>
                            </ul>
                        @else
                        <button type="button" onclick="window.location='/login'" class="btn btn-light" data-bs-toggle="dropdown">
                            Login
                            </button>

                        @endif
                    </div>

                </div>
            </div>
        </nav>

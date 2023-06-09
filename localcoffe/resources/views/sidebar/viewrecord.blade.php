<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ URL::to('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item ">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (Auth::user()->role_name=='Admin')
                            <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                            <hr>
                            <span>Role Name:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Perkebunan')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-info">Perkebunan</span>
                            @endif
                            @if (Auth::user()->role_name=='Pemilik Usaha')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-warning">Pemilik Usaha</span>
                            @endif
                        </div>
                    </div>
                </li>


                @if (Auth::user()->role_name=='Admin')
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bag-fill"></i>
                        <span>Profile</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('userManagement') }}">Ubah Profile</a>
                            <a href=""></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bag-fill"></i>
                        <span>Pesanan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="">List Data Pesanan</a>
                        </li>
                    </ul>
                </li>
                @endif


                @if (Auth::user()->role_name=='Pemilik Usaha')
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bag-fill"></i>
                                <span>Profile</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item active">
                                    <a href="{{ route('userManagement') }}">Ubah Profile</a>
                                    <a href=""></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Daftar Karyawan</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item active">
                                    <a href="{{ route('karyawan.create') }}">Menambah Karyawan</a>
                                    <a href="{{ route('karyawan.index') }}">List Karyawan</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-wallet-fill"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item active">
                                    <a href="{{ route('buyer.products.index') }}">List Produk</a>
                                </li>
                            </ul>
                        </li>
                @endif



                @if (Auth::user()->role_name=='Perkebunan')
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bag-fill"></i>
                        <span>Profile</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('userManagement') }}">Ubah Profile</a>
                            <a href=""></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Daftar Produk</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('products.index') }}">List Product</a>
                            {{-- <a href="{{ route('products.create') }}">Tambah Product</a> --}}
                            {{-- <a href="{{ route('products.edit') }}">Ubah Product</a> --}}
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Daftar Pekerja</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('form/staff/new') }}">Menambah Pekerja</a>
                            <a href="{{ route('form/view/detail') }}">List Pekerja</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-calendar-check-fill"></i>
                        <span>Jadwal</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('jadwal_panen.index') }}">List Jadwal Panen</a>
                            <a href="{{ route('jadwal_pascapanen.index') }}">List Jadwal  Pasca Panen</a>
                            <a href="{{ route('tanaman.index') }}">Tanaman</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bag-fill"></i>
                        <span>Pesanan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="">List Data Pesanan</a>
                        </li>
                    </ul>
                </li>

                 <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-wallet-fill"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="">List Transaksi</a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

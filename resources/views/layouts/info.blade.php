    <section class="info_section ">
        <div class="info_container layout_padding2">
            <div class="container">
                <div class="info_logo">
                    <a class="navbar-brand" href="index.html"> Dinas<span>Kebudayaan</span> </a>
                </div>
                <div class="info_main">
                    <div class="row">
                        <div class="col-md-3 col-lg-2">
                            <div class="info_link-box">
                                <h5>
                                    Useful Link
                                </h5>
                                <ul>
                                    <li
                                        class="nav-item {{ request()->routeIs('layouts.homepage') ? 'active fw-bold' : '' }}">
                                        <a class="nav-link" href="{{ route('layouts.homepage') }}">Home</a>
                                    </li>
                                    <li class="nav-item {{ request()->routeIs('agenda') ? 'active fw-bold' : '' }}">
                                        <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
                                    </li>
                                    <li class="nav-item {{ request()->routeIs('seniman') ? 'active fw-bold' : '' }}">
                                        <a class="nav-link" href="{{ route('seniman') }}">Seniman</a>
                                    </li>
                                    <li class="nav-item {{ request()->routeIs('budaya') ? 'active fw-bold' : '' }}">
                                        <a class="nav-link" href="{{ route('budaya') }}">Kebudayaan</a>
                                    </li>
                                    <li class="nav-item {{ request()->routeIs('contact') ? 'active fw-bold' : '' }}">
                                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <h5>
                                Dinas Kebudayaan Kabupaten Tulungagung
                            </h5>
                            <p>
                                Instansi pemerintah daerah yang berperan dalam pelestarian, pengembangan, dan
                                pemanfaatan warisan budaya daerah, termasuk seni, tradisi, dan cagar budaya, guna
                                memperkuat jati diri serta meningkatkan kesejahteraan masyarakat Tulungagung.
                            </p>
                        </div>
                        <div class="col-md-3 mx-auto  ">
                            <h5>
                                Sosial Media
                            </h5>
                            <div class="social_box">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>
                                Alamat Kantor
                            </h5>
                            <p>
                                Jl. Urip Sumoharjo No.2, Kepatihan, Kec. Tulungagung, Kabupaten Tulungagung, Jawa Timur
                            </p>
                        </div>
                    </div>
                </div>
                <div class="info_bottom">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="info_contact ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                Location
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span>
                                                Call +01 1234567890
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <span>
                                                demo@gmail.com
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="info_form ">
                                <form action="">
                                    <input type="email" placeholder="Enter Your Email" />
                                    <button>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

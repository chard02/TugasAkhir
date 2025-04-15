@include('layouts.header')
<section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('images/backgrounds/page-header-bg-1-1.jpg')}} );"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">About</h2>
                <ul class="nionx-breadcrumb list-unstyled">
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><span>Sejarah TSTH</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->
        <!-- About Two section start -->
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-two__left">
                            <div class="about-two__thumb">
                                <div class="about-two__thumb__item">
                                    <img src="{{ asset('images/about/about-2-1.png')}}" alt="laboix">
                                </div>
                                <div class="about-two__thumb__item about-two__thumb__item--two">
                                    <img src="{{ asset('images/about/about-s-2-1.png')}}" alt="laboix">
                                    <div class="about-two__items">
                                        <div class="about-two__box">
                                            <div class="about-two__box__icon">
                                                <i class="icon-chatting"></i>
                                            </div>
                                            <div class="about-two__box__content">
                                                <span class="about-two__box__subtitle">Call to anytime</span>
                                                <a href="tel:92-3080-808" class="about-two__box__text">+92 3080 808</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-two__right">
                            <div class="about-two__top">
                                <div class="sec-title text-start wow fadeInUp" data-wow-duration='1500ms'>
                                    <h6 class="sec-title__tagline"><img src="{{ asset('images/shapes/sec-title-s-1.png')}}" alt="About Us" class="sec-title__img">About Us</h6><!-- /.sec-title__tagline -->
                                    <h3 class="sec-title__title">Diverse technologies with global impact</h3><!-- /.sec-title__title -->
                                </div><!-- /.sec-title -->
                                <p class="about-two__top__text">There are many variations of passages of Lorem Ipsum avalable, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                            </div>

                            <div class="about-two__feature">
                                <div class="about-two__feature__item">
                                    <div class="about-two__feature__icon">
                                        <i class="icon-blood-test-1"></i>
                                    </div>
                                    <h4 class="about-two__feature__title"><a href="services.html">Free home sampling</a></h4>
                                    <p class="about-two__feature__text">There are in many passages of Lorem Ipsum available, but the majority.</p>
                                </div>
                                <div class="about-two__feature__item">
                                    <div class="about-two__feature__icon">
                                        <i class="icon-accuracy-1"></i>
                                    </div>
                                    <h4 class="about-two__feature__title"><a href="services.html">Accuracy in finding</a></h4>
                                    <p class="about-two__feature__text">There are in many passages of Lorem Ipsum available, but the majority.</p>
                                </div>
                            </div>
                            <ul class="about-two__list list-unstyled">
                                <li class="about-two__list__item"><i class="fas fa-check-circle"></i> Many variations of passages of lorem ipsum </li>
                                <li class="about-two__list__item"><i class="fas fa-check-circle"></i> Many variations of passages of lorem</li>
                                <li class="about-two__list__item"><i class="fas fa-check-circle"></i> Expert many variations teacher </li>
                            </ul>
                            <div class="about-two__link">
                                <a href="" class="about-two__link__btn laboix-btn">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-two__shape">
                <img src="{{ asset('images/shapes/about-shape-2-1.png')}}" alt>
            </div>
        </section>
        <!-- About Two section End -->

        @include('layouts.footer')
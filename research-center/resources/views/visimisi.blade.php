@include('layouts.header')
<section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('images/backgrounds/page-header-bg-1-1.jpg')}});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">About</h2>
                <ul class="nionx-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Visi & Misi</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="service-details">
            <div class="container">
                <div class="row gutter-y-30">
                    <div class=" col-lg-4">
                        <div class="service-sidebar">

                            <div class="service-sidebar__single  wow fadeInUp" data-wow-delay='500ms'>
                                <h3 class="service-sidebar__title">All Service</h3><!-- /.service-sidebar__title -->
                                <ul class="list-unstyled service-sidebar__nav">
                                    <li><a href="service-d-artificial.html">Artificial intelligence</a></li>
                                    <li><a href="service-d-genetic-tests.html">Specialized genetic tests</a></li>
                                    <li><a href="service-d-research.html">Chemical research</a></li>
                                    <li><a href="service-d-pathology.html">Pathology testing</a></li>
                                    <li><a href="service-d-sampling.html">Free home sampling</a></li>
                                    <li><a href="service-d-diagnoses.html">Safe diagnoses</a></li>
                                </ul><!-- /.list-unstyled service-sidebar__nav -->
                            </div><!-- /.service-sidebar__single -->

                            <div class="service-sidebar__single  wow fadeInUp" data-wow-delay='500ms'>
                                <div class="service-sidebar__contact">
                                    <h3 class="service-sidebar__contact-title">Get a free quick solution of website</h3><!-- /.service-sidebar__contact__title -->
                                    <div class="service-sidebar__contact-btn">
                                        <a href="contact.html" class="laboix-btn laboix-btn--submite">Contact</a>
                                    </div><!-- /.service-sidebar__contact__icon -->
                                    <div class="service-sidebar__contact-image">
                                        <img src="{{ asset('images/service/service-man-1.png')}}" alt>
                                    </div>
                                    <div class="service-sidebar__contact-angle">
                                        <img src="{{ asset('images/shapes/service-shape.png')}}" alt>
                                    </div>
                                </div><!-- /.service-sidebar__contact -->
                            </div>
                        </div><!-- /.sidebar -->
                    </div><!-- /. col-lg-4 -->
                    <div class=" col-lg-8">
                        <div class="service-details__content">
                            <div class="service-details__single">
                                <div class="service-details__thumbnail wow fadeInUp" data-wow-delay='300ms'>
                                    <img src=" {{ asset('images/service/service-d-1-1.png')}}" alt="Artificial intelligence">
                                </div><!-- /.service-details__thumbnail -->

                                <h3 class="service-details__title wow fadeInUp" data-wow-delay='300ms'>Visi & Misi </h3><!-- /.service-details__title -->

                                <p class="service-details__text wow fadeInUp" data-wow-delay='350ms'>Nam vel lacus eu nisl bibendum accumsan vitae vitae nibh. Nam nec eros id magna hendrerit sagittis. Nullam sed mi non odio feugiat volutpat sit amet nec elit. Maecenas id hendrerit ipsum. Sed eget auctor metus, ac dapibus dolor. Nam vel lacus eu nisl bibendum</p>

                                <h3 class="service-details__sub-title wow fadeInUp" data-wow-delay='300ms'>Nullam sed mi non odio feugiat volutpat sit amet</h3><!-- /.service-details__title -->
                                <!-- /.service-details__text -->
                                <p class="service-details__text wow fadeInUp" data-wow-delay='350ms'>Nam vel lacus eu nisl bibendum accumsan vitae vitae nibh. Nam nec eros id magna hendrerit sagittis. Nullam sed mi non odio feugiat volutpat sit amet nec elit. Maecenas</p><!-- /.service-details__text -->
                            </div><!-- /.service-details__single-->

                            <div class="service-details__single">
                                <div class="service-details__single-inner">
                                    <h3 class="service-details__title">Why choose?</h3><!-- /.service-details__title -->
                                    <div class="row gutter-y-30">
                                        <div class="col-md-6">
                                            <div class="service-details__inner-item wow fadeInUp " data-wow-delay="300ms">
                                                <div class="item-icon">
                                                    <div class="icon">
                                                        <i class="icon-chemistry-1"></i>
                                                    </div>
                                                </div>
                                                <div class="item-content">
                                                    <h4 class="item__title"><a href="about.html">Latest equipment</a></h4>
                                                    <p class="item__dec">Lorem Ipsum is simply dummy typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="service-details__inner-item wow fadeInUp " data-wow-delay="300ms">
                                                <div class="item-icon">
                                                    <div class="icon">
                                                        <i class="icon-safe"></i>
                                                    </div>
                                                </div>
                                                <div class="item-content">
                                                    <h4 class="item__title"><a href="about.html">Safe diagnoses</a></h4>
                                                    <p class="item__dec">Lorem Ipsum is simply dummy typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="service-details__single wow fadeInUp" data-wow-delay='300ms'>
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="service-details__image__item">
                                            <img src="{{ asset('images/service/service-s-1-1.png')}}" alt="service-details__image__item">
                                        </div><!-- /.service-details__image__circle -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-7">
                                        <div class="service-details__benefit">
                                            <h3 class="service-details__benefit__title">Our few benefits</h3><!-- /.service-details__title -->
                                            <p class="service-details__benefit__text">Nam vel lacus eu nisl bibendum accumsan vitae vite nibh. Nam nec eros id magna hendrerit sagittis. </p>
                                            <h4 class="service-details__benefit__sub_title">Nam nec eros id magna hendrerit</h4>
                                            <ul class="list-unstyled service-details__list">
                                                <li class="service-details__list__item"><i class="fas fa-check-circle"></i> Nibh. Nam nec eros id magna hend</li>
                                                <li class="service-details__list__item"><i class="fas fa-check-circle"></i> Vitae nibh. Nam nec eros id magna he</li>
                                                <li class="service-details__list__item"><i class="fas fa-check-circle"></i> Nam nec eros id magna </li>
                                            </ul><!-- /.list-unstyled team-details__list -->
                                        </div>
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                            </div><!-- /.service-details__single-->

                            <div class="service-details__single">
                                <div class="faq-page__accordion laboix-accrodion" data-grp-name="laboix-accrodion">
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4 class="accrodion-title__text">Why do lab tests sometimes need repeating?<span class="accrodion-title__icon"></span></h4>
                                        </div><!-- /.accordian-title -->
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p class="inner__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, or randomised words which don't look even slightly believable. If you are going There are many variations</p>
                                            </div><!-- /.accordian-content -->
                                        </div>
                                    </div><!-- /.accordian-item -->
                                    <div class="accrodion active">
                                        <div class="accrodion-title">
                                            <h4 class="accrodion-title__text">Can cancer be detected with a blood test?<span class="accrodion-title__icon"></span> </h4>
                                        </div><!-- /.accordian-title -->
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p class="inner__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, or randomised words which don't look even slightly believable. If you are going There are many variations</p>
                                            </div><!-- /.accordian-content -->
                                        </div>
                                    </div><!-- /.accordian-item -->
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4 class="accrodion-title__text">How is a blood sample collected?<span class="accrodion-title__icon"></span></h4>
                                        </div><!-- /.accordian-title -->
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p class="inner__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, or randomised words which don't look even slightly believable. If you are going There are many variations</p>
                                            </div><!-- /.accordian-content -->
                                        </div>
                                    </div><!-- /.accordian-item -->
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4 class="accrodion-title__text">How is a urine sample collected?<span class="accrodion-title__icon"></span></h4>
                                        </div><!-- /.accordian-title -->
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p class="inner__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteradution in some form by injected humour, or randomised words which don't look even slightly believable. If you are going There are many variations</p>
                                            </div><!-- /.accordian-content -->
                                        </div>
                                    </div><!-- /.accordian-item -->
                                </div>
                            </div><!-- / -->
                        </div><!-- /.service-details__content -->
                    </div><!-- /.col-md-12 col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.service-details -->
@include('layouts.footer')
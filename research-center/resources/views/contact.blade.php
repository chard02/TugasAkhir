@include('layouts.header')
<section class="page-header">
            <div class="page-header__bg" style="background-image: url({{ asset('images/backgrounds/page-header-bg-1-1.jpg')}});"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">Contact</h2>
                <ul class="nionx-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Contact</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="contact-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-one__content">
                            <ul class="list-unstyled contact-one__info">
                                <li class="contact-one__info__item">
                                    <div class="contact-one__info__icon">
                                        <i class="icon-telephone-call-1"></i>
                                    </div>
                                    <div class="contact-one__info__content">
                                        <p class="contact-one__info__text">Have any question?</p>
                                        <h4 class="contact-one__info__title"><a href="tel:+92(8800)-8960">Free + 23 (000)-8050</a></h4><!-- /.contact-one__info__title -->
                                    </div><!-- /.contact-one__info__content -->
                                </li>
                                <li class="contact-one__info__item">
                                    <div class="contact-one__info__icon">
                                        <i class="icon-email"></i>
                                    </div>
                                    <div class="contact-one__info__content">
                                        <p class="contact-one__info__text">Send email</p>
                                        <h4 class="contact-one__info__title"><a href="mailto:needhelp@company.com">demo@gmail.com</a></h4>
                                    </div>
                                </li>
                                <li class="contact-one__info__item">
                                    <div class="contact-one__info__icon">
                                        <i class="icon-pin"></i>
                                    </div><!-- /.contact-one__info__icon -->
                                    <div class="contact-one__info__content">
                                        <p class="contact-one__info__text">Visit anytime</p> <!-- /.contact-one__info__text -->
                                        <h4 class="contact-one__info__title"><a href="#">86391 elgin st. delaware</a></h4><!-- /.contact-one__info__title -->
                                    </div><!-- /.contact-one__info__content -->
                                </li>
                            </ul><!-- /.list-unstyled -->

                            <div class="contact-one__content__thumb">
                                <img src="assets/images/resources/man-contact.png" alt="laboix">
                            </div><!-- /.contact-one__content__thumb -->
                            <div class="contact-one__content__social">
                                <a href="https://instagram.com"> <i class="fab fa-instagram" aria-hidden="true"></i> <span class="sr-only">Instagram</span></a>
                                <a href="https://facebook.com"> <i class="fab fa-facebook-f" aria-hidden="true"></i> <span class="sr-only">Facebook</span> </a>
                                <a href="https://twitter.com"> <i class="fab fa-twitter" aria-hidden="true"></i> <span class="sr-only">Twitter</span> </a>
                                <a href="https://pinterest.com"> <i class="fab fa-pinterest-p" aria-hidden="true"></i> <span class="sr-only">Pinterest</span></a>
                            </div>
                        </div><!-- /.contact-one__content -->
                    </div><!-- /.col-xl-7 -->

                    <div class="col-lg-7">
                        <div class="contact-one__left">
                            <div class="contact-one__top">
                                <div class="sec-title wow fadeInUp" data-wow-duration='700ms'>
                                    <h6 class="sec-title__tagline"><img src="{{ asset('images/shapes/sec-title-s-1.png')}}" alt="Contact with  Us" class="sec-title__img">Contact with Us</h6><!-- /.sec-title__tagline -->
                                    <h3 class="sec-title__title">Feel free to write us anytime</h3><!-- /.sec-title__title -->
                                </div><!-- /.sec-title -->
                            </div><!-- /.contact-one__top -->
                            <form class="contact-one__form contact-form-validated form-one background-base wow fadeInUp" data-wow-duration="1500ms" action="inc/sendemail.php">
                                <div class="form-one__group">
                                    <div class="form-one__control">
                                        <input type="text" name="name" placeholder="Your name">
                                    </div><!-- /.form-one__control form-one__control__full -->
                                    <div class="form-one__control">
                                        <input type="email" name="email" placeholder="Email address">
                                    </div><!-- /.form-one__control form-one__control__full -->
                                    <div class="form-one__control form-one__control">
                                        <input type="tel" name="form_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone" required="">
                                    </div><!-- /.form-one__control form-one__control__full -->
                                    <div class="form-one__control form-one__control">
                                        <input type="text" name="subject" placeholder="Subject">
                                    </div><!-- /.form-one__control form-one__control__full -->
                                    <div class="form-one__control form-one__control--full">
                                        <textarea name="message" placeholder="Write a message"></textarea><!-- /# -->
                                    </div><!-- /.form-one__control -->
                                    <div class="form-one__control form-one__control--full">
                                        <button type="submit" class="laboix-btn laboix-btn--submite">Send a message</button>
                                    </div><!-- /.form-one__control -->
                                </div><!-- /.form-one__group -->
                            </form>
                        </div>
                    </div><!-- /.col-xl-5 -->

                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact-one -->


        <div class="contact-map  wow fadeInUp" data-wow-duration="1500ms">
            <div class="container-fluid">
                <div class="google-map google-map__contact">
                    <iframe title="template google map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd" class="map__@@extraClassName" allowfullscreen></iframe>
                    <div class="google-map__contact__pin">
                        <img src="assets/images/shapes/pin.png" alt="laboix icon">
                    </div>
                    <div class="google-map__contact__location">
                        <p class="google-map__contact__location__text">2972 westheimer rd. santa ana, illinois 85486 </p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div><!-- /.contact-map -->

        @include('layouts.footer')
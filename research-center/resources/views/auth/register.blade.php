@include('user.layouts.header')
<section class="page-header">
            <div class="page-header__bg" style="background-image: url{{ ('images/backgrounds/page-header-bg-1-1.jpg') }}"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">Login</h2>
                <ul class="nionx-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Login</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->
        <!-- Login Start -->
        <section class="login-page">
            <div class="container">
                <div class="login-page__info  wow fadeInUp" data-wow-delay='500ms'>
                    <p class="login-page__info__item">We have a demo account setup. <span>username:</span> <a href="login.html">demo</a> and <span> password:</span> <a href="login.html">demo</a></p>
                </div><!-- login-info -->
                <div class="login-page__inner">
                    <div class="row gutter-x-94">
                        <div class="col-lg-6 wow fadeInUp animated" data-wow-delay="400ms">
                            <div class="login-page__wrap register-page__wrap">
                                <h3 class="login-page__wrap__title">Register</h3>
                                <form id="registerForm" class="login-page__form">
                                @csrf
                                    <div class="login-page__form-input-box">
                                        <input type="email" placeholder="User name">
                                    </div>
                                    <div class="login-page__form-input-box">
                                        <input type="password" placeholder="Password*">
                                    </div>
                                    <div class="login-page__checked-box">
                                        <input type="checkbox" name="accept-policy" id="accept-policy">
                                        <label for="accept-policy"><span></span>I accept company privacy policy.</label>
                                    </div>
                                    <div class="login-page__form-btn-box">
                                        <button type="submit" class="laboix-btn laboix-btn--secondary">
                                            <span>Register</span>
                                        </button>
                                    </div>
                                </form>

                            </div><!-- register-form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login End -->

        <script>
document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah reload halaman

    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    fetch("http://127.0.0.1:8000/api/register", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            name: name,
            email: email,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            alert("Register Berhasil!");
            window.location.href = "/login"; // Redirect ke login setelah register
        } else {
            alert("Gagal Register: " + JSON.stringify(data));
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Terjadi kesalahan.");
    });
});
</script>

@include('user.layouts.footer')
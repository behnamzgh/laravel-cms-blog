<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
    <meta name="description"
        content="وب آموز وبسایت آموزش برنامه نویسی وب و موبایل ، جاوااسکریپت ، لاراول ، react ، آموزش node js با مجرب ترین مدرسین">
    <meta name="keywords"
        content="آموزش طراحی سایت,آموزش برنامه نویسی,طراحی وب,ساخت وب سایت,آموزش git,آموزش لاراول,آموزش php,آموزش react,آموزش پی اچ پی,آموزش laravel,آموزش جاوا اسکریپت,آموزش ساخت وب سایت,آموزش mvc,آموزش React Native,وب آموز , وب اموز">
    <link rel="stylesheet" href="{{ asset('/blog/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('/blog/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/blog/panel/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/blog/css/responsive.css') }}" media="(max-width:991px)">
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">-->
</head>

<body>
    <header class="c-header">
        <div class="container container--responsive container--white">
            <div class="c-header__row ">
                <div class="c-header__right">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="logo__img"></a>
                    </div>
                    <div class="c-search width-100 ">
                        <form action="" class="c-search__form position-relative">
                            <input type="text" class="c-search__input" placeholder="جستجو کنید">
                            <button class="c-search__button"></button>
                        </form>
                    </div>

                </div>
                <div class="c-header__left">
                    <div class="c-header__icons">
                        <div class="c-header__button-search "></div>
                        <div class="c-header__button-nav"></div>
                    </div>

                    {{-- check mikonim baraye namayesh dokme ha dar soorate adame login karbar --}}
                    @guest
                        <div class="c-button__login-regsiter">
                            <div><a class="c-button__link c-button--login " href="{{ route('login') }}">ورود</a></div>
                            <div><a class="c-button__link c-button--register" href="{{ route('register.show') }}">ثبت نام</a>
                            </div>
                        </div>
                    @else
                        <div style="width: 180px">
                            <div class="dropdown-select wide" tabindex="0" id="bazo-baste" onclick="userToggleDropdown()">
                                <span class="current">
                                    {{ auth()->user()->name }}
                                </span>
                                <div class="list">
                                    <li class="option selected" data-value="0" data-display-text="" tabindex="0">
                                        <a href="{{ route('dashboard') }}">داشبورد</a>
                                    </li>
                                    <li class="option selected" data-value="0" data-display-text="" tabindex="0">
                                        <a href="{{ route('profile.index') }}">پروفایل</a>
                                    </li>
                                    <li class="option" data-value="0" data-display-text="" tabindex="0" id=""
                                        onclick="logoutUser()">
                                        خروج
                                    </li>
                                    </ul>
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
        <nav class="nav" id="nav">
            <div class="c-button__login-regsiter d-none">
                <div><a class="c-button__link c-button--login" href="sign-in.html">ورود</a></div>
                <div><a class="c-button__link c-button--register" href="register.html">ثبت نام</a></div>
            </div>
            <div class="container container--nav">
                <ul class="nav__ul">
                    <li class="nav__item"><a href="#" class="nav__link">صفحه اصلی</a></li>
                    {{-- etellati k az tarafe provider inja load shode ro halghe mizanim baraye namayesh --}}
                    {{-- halghe aval baraye namayesh parent ha --}}
                    @foreach ($categories as $category)
                        <li class="nav__item nav__item--has-sub"><a href="#"
                                class="nav__link">{{ $category->name }}</a>
                            <div class="nav__sub">
                                <div class="container d-flex item-center flex-wrap container--nav">
                                    {{-- halghe dovom baraye children ha --}}
                                    @foreach ($category->children as $childCategory)
                                        <a href="" class="nav__link">{{ $childCategory->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li class="nav__item"><a href="#" class="nav__link">درباره ما</a></li>
                    <li class="nav__item"><a href="#" class="nav__link">تماس باما</a></li>
                </ul>
            </div>
        </nav>
    </header>

    {{ $slot }}

    <footer class="footer">
        <a href="" class="scroll-top"></a>

        <div class="container">
            <div class="footer__links">
                <a href="" class="footer__link">لینک اول</a>
                <a href="" class="footer__link">لینک اول</a>
                <a href="" class="footer__link">لینک اول</a>
                <a href="" class="footer__link">لینک اول</a>
                <a href="" class="footer__link">لینک اول</a>
                <a href="" class="footer__link">لینک اول</a>
            </div>
            <div class="footer__hr"></div>
            <div class="footer__about">
                <p class="footer__txt">
                    وب اموز مرجعی تخصصی برای یادگیری طراحی و برنامه نویسی وب و موبایل است. ما در وب اموز با بهره گیری از
                    نیروهای متخصص، باتجربه تمام تلاش خود را برای تهیه و تولید آموزش های با کیفیت و کامل و حرفه ای انجام
                    می دهیم. باور ما اینست که کاربران ایرانی لایق بهترین ها هستند و باید بهترین و بروزترین فیلم های
                    آموزشی، در اختیار آنها قرار بگیرد تا بتوانند به سرعت پیشرفت کنند و جزء بهترین ها شوند. امید است که
                    با همراهی هر چه بیشتر شما کاربران عزیز در این راه، ما را برای حرکتی قدرتمند در مسیر این هدف باارزش
                    یاری دهید.
                </p>
            </div>
        </div>
        <div class="footer__webamooz">
            طراحی و توسعه با لاراول توسط تیم
            <a class="footer__copy" href="https://webamooz.net">وب آموز</a>
            © 1399
        </div>
        <!--    <div class="footer-info color-444">-->
        <!--        <a class="scrollToTop"></a>-->
        <!--        <div class="container">-->
        <!--            <div class="f-links">-->
        <!--                <div class="col-2"><a href="">خدمات هاستینگ بستلا</a></div>-->
        <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
        <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
        <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
        <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
        <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="line"></div>-->
        <!--        <div class="container">-->
        <!--            <div class="f-about">-->
        <!--                <div class="col-8 margin-bottom-15">-->
        <!--                    <p>-->
        <!--                        وب اموز مرجعی تخصصی برای یادگیری طراحی و برنامه نویسی وب و موبایل است. ما در وب اموز با بهره-->
        <!--                        گیری از-->
        <!--                        نیروهای متخصص، باتجربه تمام تلاش خود را برای تهیه و تولید آموزش های با کیفیت و کامل و حرفه ای-->
        <!--                        انجام-->
        <!--                        می دهیم. باور ما اینست که کاربران ایرانی لایق بهترین ها هستند و باید بهترین و بروزترین فیلم های-->
        <!--                        آموزشی، در اختیار آنها قرار بگیرد تا بتوانند به سرعت پیشرفت کنند و جزء بهترین ها شوند. امید است-->
        <!--                        که-->
        <!--                        با همراهی هر چه بیشتر شما کاربران عزیز در این راه، ما را برای حرکتی قدرتمند در مسیر این هدف-->
        <!--                        باارزش-->
        <!--                        یاری دهید.-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="webamooz">-->
        <!--            طراحی و توسعه با لاراول توسط تیم-->
        <!--            <a href="https://webamooz.net">وب آموز</a>-->
        <!--            © 1399-->
        <!--        </div>-->
        <!--    </div>-->
    </footer>
    <div class="overlay"></div>
    <script src="{{ asset('/blog/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/blog/js/js.js') }}"></script>
    <script>
        function userToggleDropdown() {
            document.getElementById('bazo-baste').classList.toggle('open');
        }

        function logoutUser() {
            document.getElementById('logout-form').submit();
        }
    </script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>-->

</body>

</html>

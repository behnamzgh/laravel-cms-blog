<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>
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
                        <form action="{{ route('post.search') }}" class="c-search__form position-relative">
                            <input type="text" name="search" class="c-search__input" placeholder="جستجو کنید" value="{{ request()->search ?? '' }}">
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
                            <div><a class="c-button__link c-button--register" href="{{ route('register.show') }}">ثبت
                                    نام</a>
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
                                    <li class="option selected" data-value="0" data-display-text="" tabindex="0"><a
                                            href="{{ route('profile.index') }}">پروفایل</a></li>
                                    <li class="option" data-value="0" data-display-text="" tabindex="0" id=""
                                        onclick="logoutUser()">خروج</li>
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
            @guest
                <div class="c-button__login-regsiter d-none">
                    <div><a class="c-button__link c-button--login" href="{{ route('login') }}">ورود</a></div>
                    <div><a class="c-button__link c-button--register" href="{{ route('register.show') }}">ثبت نام</a></div>
                </div>
            @endguest
            <div class="container container--nav">
                <ul class="nav__ul">
                    <li class="nav__item"><a href="{{ route('home') }}" class="nav__link">صفحه اصلی</a></li>
                    {{-- etellati k az tarafe provider inja load shode ro halghe mizanim baraye namayesh --}}
                    {{-- halghe aval baraye namayesh parent ha --}}
                    @forelse ($categories as $category)
                        <li class="nav__item nav__item--has-sub"><a href="{{ route('category.show', $category->id) }}" class="nav__link">{{ $category->name }}</a>
                            <div class="nav__sub">
                                <div class="container d-flex item-center flex-wrap container--nav">
                                    {{-- halghe dovom baraye children ha --}}
                                    @foreach ($category->children as $childCategory)
                                        <a href="{{ route('category.show', $childCategory->id) }}" class="nav__link">{{ $childCategory->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @empty
                        <p>چیزی برای دسته بندی مدنظر یافت نشد</p>
                    @endforelse
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
                    as long as you are willing to focus on your goals, and committed to whatever is necessary to achieve
                    them, you are going to be successful. just a matter of TIME
                </p>
            </div>
        </div>
        <div class="footer__webamooz">
            Developed with laravel by codepoete
            <a class="footer__copy" href="https://codepoete.ir">Codepoete</a>
            © 1401
        </div>
    </footer>
    <div class="overlay"></div>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- if baraye inke agar sessioni vojod dasht in tike ejra beshe baraye namayesh payam --}}
    @if (Session::has('status'))
        <script>
            Swal.fire({
                // title: 'همه چی مرتبه...',
                text: '{{ session('status') }}',
                icon: 'success',
                confirmButtonText: 'تایید'
            })
        </script>
    @endif

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

    {{ $scripts ?? '' }}

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>-->
</body>

</html>

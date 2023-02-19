<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>داشبورد مدیریت {{$title ?? ''}}</title>
    <link rel="stylesheet" href="{{asset('blog/panel/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('blog/panel/css/responsive_991.css')}}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{asset('blog/panel/css/responsive_768.css')}}" media="(max-width:768px)">
    <link rel="stylesheet" href="{{asset('blog/panel/css/font.css')}}">
</head>

<body>
    <div class="sidebar__nav border-top border-left  ">
        <span class="bars d-none padding-0-18"></span>
        <a class="header__logo  d-none" href="{{route('home')}}"></a>
        <div class="profile__info border cursor-pointer text-center">
            <div class="avatar__img"><img src="{{asset('blog/panel/img/pro.jpg')}}" class="avatar___img">
                <input type="file" accept="image/*" class="hidden avatar-img__input">
                <div class="v-dialog__container" style="display: block;"></div>
                <div class="box__camera default__avatar"></div>
            </div>
            <span class="profile__name">نام : {{auth()->user()->name}} </span>
            <span class="profile__name">نقش: {{auth()->user()->getUserRoleInFarsi()}} </span>
        </div>

        <ul>
            <li class="item-li i-dashboard is-active"><a href="index.html">پیشخوان</a></li>
            <li class="item-li i-users"><a href="users.html"> کاربران</a></li>
            <li class="item-li i-categories"><a href="categories.html">دسته بندی ها</a></li>
            <li class="item-li i-articles"><a href="articles.html">مقالات</a></li>
            <li class="item-li i-comments"><a href="comments.html"> نظرات</a></li>
            <li class="item-li i-user__inforamtion"><a href="user-information.html">اطلاعات کاربری</a></li>
        </ul>

    </div>
    <div class="content">
        <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
            <div class="header__right d-flex flex-grow-1 item-center">
                <span class="bars"></span>
                <a class="header__logo" href="{{route('home')}}"></a>
            </div>
            <div class="header__left d-flex flex-end item-center margin-top-2">
                <a href="" class="logout" title="خروج" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
                <form action="{{route('logout')}}" method="post" id="logout-form">
                    @csrf
                </form>
            </div>
        </div>
        {{$slot}}
    </div>

</body>
<script src="{{asset('blog/panel/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('blog/panel/js/js.js')}}"></script>

</html>
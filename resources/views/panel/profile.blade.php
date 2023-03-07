<x-panel-layout>
    <x-slot name="title">
        - اطلاعات کاربری
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('profile.index') }}" class="is-active">اطلاعات کاربری</a></li>
        </ul>
    </div>
    <div class="main-content  ">
        <div class="user-info bg-white padding-30 font-size-13">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- profile picture --}}
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img"><img src="{{ auth()->user()->getProfileUrl() }}" class="avatar___img">
                        <input type="file" name="profile" accept="image/*" class="hidden avatar-img__input">
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">کاربر : {{ auth()->user()->name }}</span>
                </div>
                @error('profile')
                    <p class="error">{{ $message }}</p>
                @enderror

                {{-- name --}}
                <input class="text" type="text" name="name" placeholder="نام کاربری" value="{{ auth()->user()->name }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror

                {{-- phone --}}
                <input class="text" type="text" name="phone" placeholder="تلفن" value="{{ auth()->user()->phone }}">
                @error('phone')
                    <p class="error">{{ $message }}</p>
                @enderror

                {{-- email --}}
                <input class="text text-left" type="email" name="email" placeholder="ایمیل" value="{{ auth()->user()->email }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror

                <p class="rules">آیا مایل به تغییر رمز ورود خود هستید؟</p>

                {{-- password --}}
                <input class="text text-left" type="password" name="password" placeholder="رمز جدید">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
                <input class="text text-left" type="password" name="password_confirmation" placeholder="تکرار رمز جدید">

                <p class="rules">رمز عبور باید حداقل ۸ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند <strong>!@#$%^&*()</strong> باشد.</p>

                <br>
                <br>
                <button class="btn btn-webamooz_net">ذخیره تغییرات</button>
            </form>
        </div>

    </div>
</x-panel-layout>

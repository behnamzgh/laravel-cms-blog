<x-app-layout>
    <x-slot name="title">
        بازیابی رمز عبور
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form" action="{{route('password.email')}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="email" class="text text--left" placeholder="ایمیل">
                        @error('email')
                            <p style="text-align: right; color: red; margin-bottom: 1rem;">
                                {{ $message }}
                            </p>
                        @enderror
                        @if (Session::has('status'))
                            <p style="text-align: right; color: green; margin-bottom: 1rem;">
                                {{Session::get('status')}}
                            </p>
                        @endif
                    </div>
                    <button class="btn btn--blue btn--shadow-blue width-100 " type="submit">بازیابی</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{ route('register.show') }}" class="color--46b2f0">صفحه ثبت نام</a>
                    </div>
                </form>

            </div>
        </div>
    </main>
</x-app-layout>

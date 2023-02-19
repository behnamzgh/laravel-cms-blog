{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-app-layout>
    <x-slot name="title">
        رمز عبور جدید
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">رمز عبور جدید</h1>

                <form class="sign-page__form" action="{{ route('password.store') }}" method="POST">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div>
                        <input type="text" name="email" class="text text--left" placeholder="ایمیل" value="{{ $request->email }}">
                        @error('email')
                            <p style="text-align: right; color: red; margin-bottom: 1rem;">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" class="text text--left" placeholder="رمز عبور جدید">
                        @error('password')
                            <p style="text-align: right; color: red; margin-bottom: 1rem;">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password_confirmation" class="text text--left" placeholder="تایید رمز عبور">
                    </div>
                    <button class="btn btn--blue btn--shadow-blue width-100 " type="submit">تایید</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{ route('register.show') }}" class="color--46b2f0">صفحه ثبت نام</a>
                    </div>
                </form>

            </div>
        </div>
    </main>
</x-app-layout>

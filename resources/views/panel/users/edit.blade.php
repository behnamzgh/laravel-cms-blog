<x-panel-layout>
    <x-slot name="title">
        - ویرایش کاربر
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="">کاربران</a></li>
            <li><a href="" class="is-active">ویرایش کاربران</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters bg-white margin-bottom-20">
            <div class="col-12">
                <p class="box__title">ویرایش کاربر</p>
                <form action="{{route('users.update', $user->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('put')
                    <input type="text" name="name" class="text" value="{{$user->name}}" placeholder="نام و نام خانوادگی">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <input type="email" name="email" class="text" value="{{$user->email}}" placeholder="ایمیل">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <input type="text" name="phone" class="text" value="{{$user->phone}}" placeholder="شماره موبایل">
                    @error('phone')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <select name="role">
                        <option value="user" @php if($user->role === 'user') echo('selected') @endphp >کاربر عادی</option>
                        <option value="author" @php if($user->role === 'author') echo('selected') @endphp >نویسنده</option>
                        <option value="admin" @php if($user->role === 'admin') echo('selected') @endphp >مدیر</option>
                    </select>
                    <button class="btn btn-webamooz_net" type="submit">ویرایش</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>

<x-panel-layout>
    <x-slot name="title">
        - کاربران
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('users.index') }}" class="is-active">کاربران</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('users.index') }}">همه کاربران</a>
                <a class="tab__item" href="{{ route('users.create') }}">ایجاد کاربر جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
        </div>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>نام و نام خانوادگی</th>
                        <th>موبایل</th>
                        <th>ایمیل</th>
                        <th>سطح کاربری</th>
                        <th>تاریخ عضویت</th>
                        <th>آخرین ویرایش</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr role="row" class="">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getUserRoleInFarsi() }}</td>
                            <td>{{ $user->jalali_created_at() }}</td>
                            <td>{{ $user->jalali_updated_at() }}</td>
                            <td>

                                {{-- in if baraye inke faghat admin betone tavanaii delete dashte bashe va --}}
                                {{-- karbari k login karde natone khodesh ro delete kone --}}
                                @if (auth()->user()->role === 'admin' && auth()->user()->id !== $user->id)
                                    {{-- 2ta meghdar ba onlick pass midim yekish event k hamon click karbar hast --}}
                                    {{-- dovomi id user k ersal mishe b function deleteUser on paiin --}}
                                    <a href="" class="item-delete mlg-15" title="حذف" onclick="deleteUser(event, {{ $user->id }})"></a>
                                @endif

                                <a href="{{ route('users.edit', $user->id) }}" class="item-edit " title="ویرایش"></a>

                                {{-- inja va on paiin agar to id {{$user->id}} ro nazarim modam tekrari mishe va karbar ro tashkhis nemide --}}
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" id="delete-user-{{ $user->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            function deleteUser(event, id) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا مطمئن هستید؟',
                    text: "بعد از حذف قادر به بازگردانی نیستید...",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'حذف',
                    cancelButtonText: 'پشیمون شدم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-user-' + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>

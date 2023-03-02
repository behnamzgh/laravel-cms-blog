<x-panel-layout>
    <x-slot name="title">
        - مدیریت مقالات
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('posts.index') }}" class="is-active">مقالات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('posts.index') }}">لیست مقالات</a>
                <a class="tab__item " href="{{ route('posts.create') }}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form action="{{route('posts.index')}}">
                    <div class="t-header-searchbox font-size-13">
                        <div type="text" class="text search-input__box font-size-13">جستجوی مقاله
                            <div class="t-header-search-content ">
                                <input type="text" name="search" class="text" placeholder="نام مقاله">
                                <button class="btn btn-webamooz_net">جستجو</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>نویسنده</th>
                        <th>تاریخ ایجاد</th>
                        <th>تاریخ ویرایش</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                    <tbody>
                        <tr role="row" class="">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->jalali_created_at() }}</td>
                            <td>{{ $post->jalali_updated_at() }}</td>
                            <td>
                                <a href="" onclick="deletePost(event, {{ $post->id }})" class="item-delete mlg-15" title="حذف"></a>
                                <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="item-edit" title="ویرایش"></a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post" id="delete-post-{{ $post->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            {{-- baraye namayesh pagination ama vaghti search konim dar safahate badi paginate --}}
            {{-- keyword search shode ro nemiare k bayad inja ba estefade az tabe append  --}}
            {{-- query k search shode ro b tamame safahat ezafe mikone --}}
            {{ $posts->appends(request()->query())->links() }}
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            function deletePost(event, id){
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
                        document.getElementById('delete-post-' + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>

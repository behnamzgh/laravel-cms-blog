<x-panel-layout>
    <x-slot name="title">
        - مدیریت نظرات
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('comments.index') }}" class="is-active">نظرات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('comments.index') }}"> همه نظرات</a>
                {{-- in parametr ro hamrah route ersal mikonim b controller --}}
                <a class="tab__item is-active" href="{{ route('comments.index', ['approved' => 0]) }}">نظرات تاییده نشده</a>
                <a class="tab__item is-active" href="{{ route('comments.index', ['approved' => 1]) }}">نظرات تاییده شده</a>
            </div>
        </div>


        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>ارسال کننده</th>
                        <th>برای</th>
                        <th>دیدگاه</th>
                        <th>تاریخ</th>
                        <th>تعداد پاسخ ها</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                @foreach ($comments as $comment)
                    <tbody>
                        <tr role="row">
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->jalali_created_at() }}</td>
                            <td>{{ $comment->replies_count }}</td>
                            <td class="{{ $comment->status ? 'text-success' : 'text-error' }}">
                                {{ $comment->get_status() }}</td>
                            <td>
                                {{-- chon az noe bool hast in shart yani age 1 bod ghesmate rad namayesh bede or else --}}
                                @if($comment->status)
                                <a href="" onclick="updateComment(event, {{ $comment->id }})" class="item-reject mlg-15" title="رد"></a>
                                @else
                                <a href="" onclick="updateComment(event, {{ $comment->id }})" class="item-confirm mlg-15" title="تایید"></a>
                                @endif

                                <a href="show-comment.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>

                                <a href="" class="item-delete mlg-15" onclick="deleteComment(event, {{ $comment->id }})" title="حذف"></a>

                                {{-- form update status --}}
                                <form action="{{ route('comments.update', $comment->id) }}" method="post" id="update-comment-{{ $comment->id }}">
                                    @csrf
                                    @method('put')
                                </form>

                                {{-- form delete comment --}}
                                <form action="{{ route('comments.destroy', $comment->id) }}" id="delete-comment-{{ $comment->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <x-slot name="scripts">
        <script>

            // script update
            function updateComment(event, id){
                event.preventDefault()
                document.getElementById('update-comment-' + id).submit()
            }

            // script delete
            function deleteComment(event, id) {
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
                        document.getElementById('delete-comment-' + id).submit();
                    }
                })
            }

        </script>
    </x-slot>
</x-panel-layout>

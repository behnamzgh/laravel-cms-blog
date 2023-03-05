<x-panel-layout>
    <x-slot name="title">
        - مدیریت نظرات
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html">پیشخوان</a></li>
            <li><a href="comments.html" class="is-active">نظرات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="comments.html"> همه نظرات</a>
                <a class="tab__item " href="comments.html">نظرات تاییده نشده</a>
                <a class="tab__item " href="comments.html">نظرات تاییده شده</a>
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
                            <td class="{{ $comment->status ? 'text-success' : 'text-error' }}">{{ $comment->get_status()}}</td>
                            <td>
                                <a href="" class="item-delete mlg-15" title="حذف"></a>
                                <a href="show-comment.html" class="item-reject mlg-15" title="رد"></a>
                                <a href="show-comment.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="show-comment.html" class="item-confirm mlg-15" title="تایید"></a>
                                <a href="edit-comment.html" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-panel-layout>

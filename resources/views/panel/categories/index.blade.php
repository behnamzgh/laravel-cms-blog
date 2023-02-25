<x-panel-layout>
    <x-slot name="title">
        - دسته بندی ها
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('categories.index') }}" class="is-active">دسته بندی ها</a></li>
        </ul>
    </div>
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                            <tr role="row" class="title-row">
                                <th>شناسه</th>
                                <th>نام دسته بندی</th>
                                <th>نام انگلیسی دسته بندی</th>
                                <th>دسته پدر</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr role="row" class="">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->getParentName() }}</td>
                                    <td>

                                        {{-- delete category --}}
                                        <a href="" class="item-delete mlg-15" title="حذف" onclick="deleteCategory(event, {{ $category->id }})"></a>
                                        <a href="{{route('categories.edit', $category->id)}}" class="item-edit " title="ویرایش"></a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post" id="delete-category-{{ $category->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                <form action="{{ route('categories.store') }}" method="post" class="padding-30">
                    @csrf

                    <input type="text" name="name" placeholder="نام دسته بندی" class="text">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <input type="text" name="slug" placeholder="نام انگلیسی دسته بندی" class="text">
                    @error('slug')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

                    <select class="select" name="category_id" id="">
                        <option value="">ندارد</option>
                        @foreach ($parentCategories as $parentCategory)
                            <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-webamooz_net">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            function deleteCategory(event, id) {
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
                        document.getElementById('delete-category-' + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>

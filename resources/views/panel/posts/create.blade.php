<x-panel-layout>
    <x-slot name="title">
        - ایجاد مقاله
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('posts.index') }}"> مقالات</a></li>
            <li><a href="{{ route('posts.create') }}" class="is-active">ایجاد مقاله جدید</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('posts.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    {{-- title --}}
                    <input type="text" name="name" class="text" placeholder="عنوان مقاله">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    {{-- tags --}}
                    <p>دسته بندی های مقاله</p>
                    <ul class="tags">
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field">
                        </li>
                    </ul>
                    @error('categories')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    {{-- file --}}
                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" name="image" class="file-upload" id="files" name="files" />
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>
                    @error('image')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    {{-- text --}}
                    <textarea name="content" id="content" placeholder="متن مقاله" class="text "></textarea>
                    @error('content')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    {{-- submit button --}}
                    <button class="btn btn-webamooz_net">ایجاد مقاله</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content', {
                language: 'fa',
                filebrowserUploadUrl: '{{ route("upload-file", ["_token" => csrf_token()]) }}',
                filebrowserUploadMethod: 'form',
            })
        </script>

        {{-- hamin tike jquery paiin k ezafe nashode bod ghesmate tag input form aslan kar nemikard! --}}
        {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
        <script src="{{ asset('blog/panel/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('blog/panel/js/tagsInput.js') }}"></script>
    </x-slot>
</x-panel-layout>

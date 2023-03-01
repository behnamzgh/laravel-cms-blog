<x-panel-layout>
    <x-slot name="title">
        - ویرایش مقاله
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('posts.index') }}"> مقالات</a></li>
            <li><a href="{{ route('posts.edit', $post->id) }}" class="is-active">ویرایش مقاله</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ویرایش مقاله</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('posts.update', $post->id) }}" class="padding-30" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <input type="text" name="title" class="text" placeholder="عنوان مقاله"
                        value="{{ $post->title }}">
                    @error('title')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    {{-- categories --}}
                    <ul class="tags">
                        @foreach ($post->categories as $category)
                            <li class="addedTag">{{ $category->name }}<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                                <input type="hidden" value="{{ $category->name }}" name="categories[]">
                            </li>
                        @endforeach
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field">
                        </li>
                    </ul>
                    @error('categories')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    {{-- banner --}}
                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" class="file-upload" id="files" name="banner" />
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>

                    {{-- content --}}
                    <textarea placeholder="متن مقاله" class="text" name="content">{!! $post->content !!}</textarea>
                    @error('content')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-webamooz_net">ویرایش مقاله</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content', {
                language: 'fa',
                filebrowserUploadUrl: '{{ route('upload-file', ['_token' => csrf_token()]) }}',
                filebrowserUploadMethod: 'form',
            })
        </script>

        {{-- hamin tike jquery paiin k ezafe nashode bod ghesmate tag input form aslan kar nemikard! --}}
        {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
        <script src="{{ asset('blog/panel/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('blog/panel/js/tagsInput.js') }}"></script>
    </x-slot>
</x-panel-layout>

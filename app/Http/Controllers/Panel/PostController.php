<?php

namespace App\Http\Controllers\Panel;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Post\CreatePostRequest;
use App\Http\Requests\Panel\Post\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index()
    {
        // agar useri k login karde admin bod hame post haro btone bbine
        // vagarna(yani age author) bod faghat post haye khodesh ro betone bbine
        if(\auth()->user()->role == 'admin'){
            $posts = Post::paginate();
        }else{
            $posts = Post::where('user_id', \auth()->user()->id)->paginate();
        }

        return \view('panel.posts.index', \compact('posts'));
    }

    public function create()
    {
        return \view('panel.posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        // inja az model category ba function whereIn category haii k az taraf karbar ersal mishe ro
        // ba table category ghesmate name moghayese mikone agar barabar bodan onaro migire bad id
        // hashon ro dar miare va tabdil b araye mikone
        $categoryIds = Category::whereIn('name', $request->categories)->get()->pluck('id')->toArray();

        // agar category haii k karbar ersal karde va to database category daravordimesh
        // rikhtimesh to $categoryIds tedadesh kamtar az 1 bod yani be ebarati mojod nabod
        // biad ye error b user neshon bde
        if(\count($categoryIds) < 1){
            throw ValidationException::withMessages([
                // inja migim baraye bakhshe categories ye error darim
                'categories' => ['همچین دسته بندی موجود نمیباشد']
            ]);
        }

        // moshakhasaat banner va zakhire on
        $file = $request->file('banner');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('images/banners', $file_name, 'public_files');

        // zakhire etellat ersali form
        $data = $request->validated();
        $data['banner'] = $file_name;
        $data['user_id'] = \auth()->user()->id;
        $post = Post::create($data);

        $post->categories()->sync($categoryIds);

        \session()->flash('status', 'پست با موفقیت ایجاد شد');
        return \redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return \view('panel.posts.edit', \compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // 1
        $data = $request->validated();
        // 2
        $categoryIds = Category::whereIn('name', $request->categories)->get()->pluck('id')->toArray();
        // 3
        if(\count($categoryIds) < 1){
            throw ValidationException::withMessages([
                'categories' => 'حداقل یک دسته بندی معتبر باید انتخاب شود'
            ]);
        }
        // 4
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images/banners', $file_name, 'public_files');
            $data['banner'] = $file_name;
        }
        // 5
        $post->update($data);
        // 6
        $post->categories()->sync($categoryIds);
        // 7
        \session()->flash('status', 'مقاله به درستی ویرایش شد');
        return \redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // inja authorize kone ba estefade az method delete PostPolicy k $post ro ham behesh pass midim
        $this->authorize('delete', $post);
        $post->delete();
        \session()->flash('status', 'پست مورد نظر حذف شد');
        return \back();
    }
}

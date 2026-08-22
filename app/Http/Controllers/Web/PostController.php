<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;  // <--- السطر الجديد ده
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
class PostController extends Controller
{
    public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
}
    // عرض قائمة المقالات
public function index()
{
    $posts = Post::with('user')->get();
    return view('posts.index', compact('posts'));
}
  // عرض نموذج الإضافة
    public function create()
    {
        return view('posts.create');
    }

    // حفظ مقال جديد
public function store(StorePostRequest $request){
Post::create($request->validated()+['user_id'=>auth()->id()]);
    return redirect('/posts')->with('success', 'تم إضافة المقال بنجاح!');

}

    // عرض نموذج التعديل
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // تحديث المقال
public function update(UpdatePostRequest $request, Post $post)
{
    $post->update($request->validated());

    return redirect('/posts')->with('success', 'تم تحديث المقال بنجاح!');
}

    // عرض صفحة تأكيد الحذف
    public function delete(Post $post)
    {
        return view('posts.delete', compact('post'));
    }

    // حذف المقال نهائياً
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'تم حذف المقال بنجاح!');
    }
public function show(Post $post)
{
    return view('posts.show', compact('post'));
}}


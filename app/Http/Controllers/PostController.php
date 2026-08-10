<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        Post::create([
            'title'   => $request->title,
            'body'    => $request->body,
            'user_id' => auth()->id() ?? 1,
        ]);

        return redirect('/posts')->with('success', 'تم إضافة المقال بنجاح!');
    }

    // عرض نموذج التعديل
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // تحديث المقال
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

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


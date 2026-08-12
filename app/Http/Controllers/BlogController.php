<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::with('user')->paginate();
        return view('blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'title'=>'required|string|max:255',
         'content'=> 'required|string'
        ]);

        Blog::create([
'title'=>$request->title,
'content'=>$request->content,
'user_id'=>1
        ]);
      return redirect('/blogs')->with('success','تم اضافة المقال بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit',compact('blog'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content'  => 'required|string',
        ]);

        $blog->update([
            'title' => $request->title,
            'content'  => $request->content,
        ]);
       return redirect('/blogs')->with("success",'تم تعديل المقال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
       return redirect('blogs')->with('success','تم الحذف بنجاح');}
}

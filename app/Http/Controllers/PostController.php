<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
    $posts = Post::all();
    return view('posts.index', compact('posts'));}

    public function show($id){
    $posts = Post::findOrFail($id);
    return view('post.show', compact('posts'));}

    public function create(){
    return view('post.create');}

    public function store(Request $request){
    Post::create($request->all());
    return redirect('/post');}

    public function destroy($id){
    Post::findOrFail($id)->delete();
    return redirect('/post');}
    }
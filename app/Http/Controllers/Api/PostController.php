<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = Post::with('user')->latest()->paginate(10);
return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request){
$validated = $request->validate([
'title' => 'required|string|max:255',
'body'  => 'required|string',
]);

$post = $request->user()->posts()->create($validated);
return response()->json([
'message' => 'ﺗﻢ إﻧﺸﺎء اﻟﻤﻘﺎل ﺑﻨﺠﺎح',
'data'    
=> new PostResource($post)
], 201);
}

    /**
     * Display the specified resource.
     */
public function show(Post $post){
return new PostResource($post->load('user'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

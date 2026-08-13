<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'/*,[Array Of data]*/);
});

Route::resource('/blogs',BlogController::class);
Route::resource('/posts',PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// passing data to the specified page
Route::view('create','user',[
'blog_title'=>'مدونتي الاولى',
'blog_content'=>'مدونتي الاولى على الاطلاق'
]);//(what user type in url, viewName, Arr of data)

// specify link syntax
// Route::get('products/{id/posts/{post_id}}',function($id,$post_id)

// route captures ID from URL, looks it up in predefined categories array, 
// passes matching category name (or "not found" message) to 'products' view as 'the_id
Route::get('products/{id}',function($id){
    // $id=request('id');
    $cats=[
        '1'=>'Games',
        '2'=>'Programming',
        '3'=>'Books'
    ];
return view('products',[
'the_id'=>$cats[$id] ?? "This Id Is Not Found"
    ]);
});
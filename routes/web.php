<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Idea;

use function Laravel\Prompts\table;

Route::get('/', function () {
    // return view('ideas',[
    //     "greetings"=>'Hello',
    //     'person'=>request('person','World'),//'World' is default value 
    // 'tasks'=>[
    //     'Go to the market',
    //     'Walk the dog',
    //     'Watch a video tutorial'
    // ]
    //     ]);

    // $idea=session()->get('newIdea',[]);//brings already stored value in session
    // under newIdea and store in var
// $idea=DB::table('ideas')->get();

$idea=Idea::where('state','pending')->get();
$idea=Idea::query()->when(
    request('state'), function($query, $state){
$query->where('state',$state);
    })->get();
// return $idea;
    return view ('ideas',[
    //"I am sending the data to the ideas page, and I am naming it newIdea."
        'newIdea'=>$idea//newIdea is only way to access data
    ]);
});

Route::get('delete-ideas',function(){
    session()->forget('newIdea');
   return redirect('/'); 
});

// request-> holds data from user
Route::post('/ideas',function(){
$idea=request('newIdea');//fetch an idea
// session()->push('newIdea',$idea); //push it to session

// fetched idea is passed to eloquent model
Idea::create([
'describtion'=>$idea,
'state'=>'pending'
]);

return redirect('/');
});

// Short Hand
Route::view('contact','contact')->name('request');

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

Route::view('/product','product')->name('product');
Route::view('/create-blog','blogs.create')->name('createBlog');

// route captures ID from URL, looks it up in predefined categories array, 
// passes matching category name (or "not found" message) to 'products' view as 'the_id
Route::get('product/{id}',function($id){
    // $id=request('id');
    $cats=[
        '1'=>'Games',
        '2'=>'Programming',
        '3'=>'Books'
    ];
return view('product',[
'the_id'=>$cats[$id] ?? "This Id Is Not Found"
    ]);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Protected routes, cant be entered without signing in
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::view('products','product');
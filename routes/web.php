<?php

use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Web\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

use function Laravel\Prompts\table;

// post Practice
Route::resource('/posts', PostController::class);

// Product Practice
// Route::get('product/{id}',function($id){
//     // $id=request('id');
//     $cats=[
//         '1'=>'Games',
//         '2'=>'Programming',
//         '3'=>'Books'
//     ];
// return view('product',[
// 'the_id'=>$cats[$id] ?? "This Id Is Not Found"
//     ]);
// });

// Route::view('products','product');
// Side Practices
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
Route::resource('/blogs',BlogController::class);

// passing data to the specified page
Route::view('create','user',[
'blog_title'=>'مدونتي الاولى',
'blog_content'=>'مدونتي الاولى على الاطلاق'
]);//(what user type in url, viewName, Arr of data)

// specify link syntax
// Route::get('products/{id/posts/{post_id}}',function($id,$post_id)

// route captures ID from URL, looks it up in predefined categories array, 
// passes matching category name (or "not found" message) to 'products' view as 'the_id

// Breeze authentication
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    require __DIR__.'/auth.php';
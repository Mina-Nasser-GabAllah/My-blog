<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\User;
use App\Http\Controllers\Admin\Image;
use App\Http\Controllers\Web;
use App\Http\Controllers\Admin\Msg;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('/')->group(function (){
    Route::get('/Main',[Web\Main\Main_cont::class, 'index'])->name('Web.Main');
    Route::get('/ContactUs',[Web\Msg\Msg_cont::class, 'send'])->name('Web.Msg');
    Route::post('/ContactUs',[Web\Msg\Msg_cont::class, 'send'])->name('Web.Msg');


    Route::get('/Profile',[Auth\Profile_cont::class, 'update'])->name('Web.Profile');
    Route::post('/Profile',[Auth\Profile_cont::class, 'update'])->name('Web.Profile');


    Route::prefix('/Section')->group(function () {
        Route::get('/{id}',[Web\Section\Section_cont::class, 'index'])->name('Web.Section.Main');
    });
    Route::prefix('/Post')->group(function () {
        Route::get('/{id}',[Web\Post\Post_cont::class, 'index'])->name('Web.Post.Index');
        Route::post('/{id}',[Web\Post\Post_cont::class, 'index'])->name('Web.Post.Index');
        Route::get('/Comment/{id}',[Web\Post\Post_cont::class, 'editComment'])->name('Web.Comment.Edit');
        Route::post('/Comment/{id}',[Web\Post\Post_cont::class, 'editComment'])->name('Web.Comment.Edit');
        Route::get('/Comment/Delete/{id}',[Web\Post\Post_cont::class, 'deleteComment'])->name('Web.Comment.Delete');

    });

});


Route::prefix('Admin')->middleware('AdminPanel')->group(function (){
    Route::get('/Main',function (){return view('Admin.Main_view');})->name('Admin.main');
    Route::prefix('Section')->middleware('AdminRole')->group(function (){
        Route::get('/',[Admin\Section\Section_cont::class, 'index'])->name('Section.Index');

        Route::get('Add',[Admin\Section\Section_cont::class, 'add'])->name('Section.Add');
        Route::post('Add',[Admin\Section\Section_cont::class, 'add'])->name('Section.Add');

        Route::get('Delete/{id}',[Admin\Section\Section_cont::class, 'delete'])->name('Section.Delete');
        Route::post('Delete/{id}',[Admin\Section\Section_cont::class, 'delete'])->name('Section.Delete');

        Route::get('Update/{id}',[Admin\Section\Section_cont::class, 'update'])->name('Section.Update');
        Route::post('Update/{id}',[Admin\Section\Section_cont::class, 'update'])->name('Section.Update');

    });
    Route::prefix('Image')->middleware('AdminRole')->group(function (){
        Route::get('/',[Image\Image_cont::class, 'index'])->name('Image.Index');

        Route::get('Add',[Image\Image_cont::class, 'add'])->name('Image.Add');
        Route::post('Add',[Image\Image_cont::class, 'add'])->name('Image.Add');

        Route::get('Delete/{id}',[Image\Image_cont::class, 'delete'])->name('Image.Delete');
        Route::post('Delete/{id}',[Image\Image_cont::class, 'delete'])->name('Image.Delete');
        Route::get('Update/{id}',[Image\Image_cont::class, 'update'])->name('Image.Update');
        Route::post('Update/{id}',[Image\Image_cont::class, 'update'])->name('Image.Update');
    });
    Route::prefix('Post')->group(function (){
        Route::get('/',[Post\Post_cont::class, 'index'])->name('Post.Index');

        Route::get('Add',[Post\Post_cont::class, 'add'])->name('Post.Add');
        Route::post('Add',[Post\Post_cont::class, 'add'])->name('Post.Add');

        Route::get('Delete/{id}',[Post\Post_cont::class, 'delete'])->name('Post.Delete');
        Route::post('Delete/{id}',[Post\Post_cont::class, 'delete'])->name('Post.Delete');

        Route::get('Update/{id}',[Post\Post_cont::class, 'update'])->name('Post.Update');
        Route::post('Update/{id}',[Post\Post_cont::class, 'update'])->name('Post.Update');
       });
    Route::prefix('User')->group(function (){
        Route::get('/',[User\User_cont::class, 'index'])->name('User.Index');

        Route::get('Add',[User\User_cont::class, 'add'])->name('User.Add');
        Route::post('Add',[User\User_cont::class, 'add'])->name('User.Add');

        Route::get('Delete/{id}',[User\User_cont::class, 'delete'])->name('User.Delete');
        Route::post('Delete/{id}',[User\User_cont::class, 'delete'])->name('User.Delete');

        Route::get('Update/{id}',[User\User_cont::class, 'update'])->name('User.Update');
        Route::post('Update/{id}',[User\User_cont::class, 'update'])->name('User.Update');
    });

    Route::prefix('Msg')->group(function (){

        Route::get('Delete/{id}',[Msg\Msg_cont::class, 'delete'])->name('Msg.Delete');
        Route::post('Delete/{id}',[Msg\Msg_cont::class, 'delete'])->name('Msg.Delete');
        Route::get('/Read/{id}',[Msg\Msg_cont::class, 'read'])->name('Msg.Read');

        Route::get('/{type}',[Msg\Msg_cont::class, 'index'])->name('Msg.Index');

    });
});



Route::get('/', function () {
    return view('welcome');
});
Route::get('test',function (){
   return view('Test_view');
});
Route::get('laravel',function (){
    return view('Post_view');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ParentCommunityController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\SubcriptionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SkillsetController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CKEditorController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

    Route::group(['middleware' => ['role:admin|moderator']], function () {


        Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');

        //user management
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create',  [UserController::class, 'create'])->name('users-create');
        Route::post('/users/store',  [UserController::class, 'store'])->name('users-store');
        Route::get('/users/{user}/edit',  [UserController::class, 'edit']);
        Route::put('/user/update/{id}',  [UserController::class, 'update']);
        Route::get('/user/delete/{id}',  [UserController::class, 'destroy']);
        Route::get('/user/show/{id}',  [UserController::class, 'show']);

        //forum parent community
        Route::get('/parent-community',  [ParentCommunityController::class, 'index']);
        Route::post('/parent-community/store',  [ParentCommunityController::class, 'store']);

        //forum community
        Route::get('/community',  [CommunityController::class, 'index']);
        Route::post('/community/store',  [CommunityController::class, 'store']);

        //skillset
        Route::get('/skillset', [SkillsetController::class, 'index'])->name('skillset');
        Route::get('/skillset/create', [SkillsetController::class, 'create'])->name('skillset-create');
        Route::post('/skillset/store', [SkillsetController::class, 'store'])->name('skillset-store');


    });

    Route::group(['middleware' => ['role:student|alumni|professor']], function () {
        //profile management
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/store', [UserSkillController::class, 'store'])->name('userskill');

        //community subscription
        Route::post('/community/subscribe', [SubcriptionController::class,'subscribe']);
        Route::post('/community/unsubscribe', [SubcriptionController::class,'unsubscribe']);
        Route::post('/community/subscribeS', [SubcriptionController::class,'subscribeS']);
        Route::post('/community/unsubscribeS', [SubcriptionController::class,'unsubscribeS']);

        Route::get('/post/create',[PostController::class, 'create']);
        Route::post('/post/store',[PostController::class, 'store']);
        Route::post('/ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');
        //cOMMENT
        Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

    });

    //place routes below for auth enabled features

});
Route::get('/home', [HomeController::class, 'index'])->name('home');
//forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/post/{slug}', [PostController::class, 'show']);
//community
Route::get('/community/{slug}',[CommunityController::class, 'show']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog');


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
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AuthProjectController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BugReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CommunityRequestController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ConnectFilterController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DislikeController;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ConversationController;

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
    return redirect("/home");
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
        Route::post('/skillset/delete/{id}', [SkillsetController::class, 'delete'])->name('skillset-delete');

        //projects
        Route::get('/auth/projects', [AuthProjectController::class, 'index']);
        Route::get('/auth/projects/approve/{id}', [AuthProjectController::class, 'approve']);
        Route::get('/auth/projects/reject/{id}', [AuthProjectController::class, 'reject']);

        //event
        Route::get('/event/list',  [EventController::class, 'list'])->name('event-list');
        Route::get('/event/list/{id}',  [EventController::class, 'listView'])->name('event-listView');
        Route::get('/event/create',  [EventController::class, 'create'])->name('event-create');
        Route::post('/event/store',  [EventController::class, 'store'])->name('event-store');
    });

    Route::group(['middleware' => ['role:student|alumni|professor']], function () {
        //profile management
        Route::get('/profile/show/{id}', [ProfileController::class, 'index']);
        Route::get('/profile/edit', [ProfileController::class, 'edit']);
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profileupdate');
        Route::post('/profile/storeSkill', [UserSkillController::class, 'store'])->name('userskill');
        Route::post('/profile/deleteSkill/{id}', [UserSkillController::class, 'delete'])->name('userdeleteskill');
        Route::post('/profile/storeEducation', [EducationController::class, 'store'])->name('usereducation');
        Route::post('/profile/deleteEducation/{id}', [EducationController::class, 'delete'])->name('userdeleteeducation');
        Route::post('/profile/storeWork', [WorkController::class, 'store'])->name('userwork');
        Route::post('/profile/deleteWork/{id}', [WorkController::class, 'delete'])->name('userdeletework');

        //community subscription
        Route::post('/community/subscribe', [SubcriptionController::class, 'subscribe']);
        Route::post('/community/unsubscribe', [SubcriptionController::class, 'unsubscribe']);
        Route::post('/community/subscribeS', [SubcriptionController::class, 'subscribeS']);
        Route::post('/community/unsubscribeS', [SubcriptionController::class, 'unsubscribeS']);

        //Request Community
        Route::get('/community-request', [CommunityRequestController::class, 'create']);
        Route::post('/community-request/store', [CommunityRequestController::class, 'store']);

        //Report a Bug
        Route::get('/report-bug', [BugReportController::class, 'create']);
        Route::post('/report-bug/store', [BugReportController::class, 'store']);

        Route::get('/post/create', [PostController::class, 'create']);
        Route::post('/post/store', [PostController::class, 'store']);

        //post upvote
        Route::post('/post/like', [LikeController::class, 'like']);
        Route::post('/post/unlike', [LikeController::class, 'unlike']);

        //post upvote
        Route::post('/post/dislike', [DislikeController::class, 'dislike']);
        Route::post('/post/undislike', [DislikeController::class, 'undislike']);

        //comment
        Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

        //project management
        Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/project/delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
        Route::get('/project/myprojects', [ProjectController::class, 'myprojects'])->name('project.myprojects');
        //blog creation
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

        //message
        Route::get('/message', [ConversationController::class, 'index'])->name('conversation');
        Route::get('/message/{id}/view', [ConversationController::class, 'view'])->name('conversation.view');
        Route::get('/message/{id}/create', [MessageController::class, 'create'])->name('message.create');
        Route::post('/message/{id}/store', [MessageController::class, 'store'])->name('message.store');
    });

    //place routes below for auth enabled features

    Route::group(['middleware' => ['role:alumni']], function () {
        Route::get('/connect/job/create', [ConnectController::class, 'jobCreate'])->name('connect.jobcreate');
        Route::post('/connect/job/store', [ConnectController::class, 'jobStore'])->name('connect.jobstore');
        Route::get('/connect/job/myoffers', [ConnectController::class, 'myoffers'])->name('connect.myoffers');
        Route::get('/connect/job/mark-inactive/{id}', [ConnectController::class, 'markInactive'])->name('connect.mark-inactive');
        Route::get('/connect/job/applicants/{id}', [ApplicantController::class, 'viewApplicants'])->name('connect.job.index');
        //filters
        Route::post('/connect/myofferfilter', [ConnectFilterController::class, 'myofferfilter'])->name('connect.myofferfilter');
        Route::post('/connect/applicantfilter', [ConnectFilterController::class, 'applicantfilter'])->name('connect.applicantfilter');
    });

    Route::group(['middleware' => ['role:student']], function () {
        Route::get('/connect/job/myapplications', [ApplicantController::class, 'myApp'])->name('connect.job.myapp');
        Route::post('/connect/job/apply', [ApplicantController::class, 'store'])->name('connect.job.apply');
        Route::get('/connect/job/revoke/{id}', [ApplicantController::class, 'destroy'])->name('connect.job.apply.destroy');
    });
});

//public routes

Route::post('/ckeditor/upload',  [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
Route::get('/home', [HomeController::class, 'index'])->name('home');
//forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::get('/forum/explore', [ForumController::class, 'explore'])->name('forum.explore');
//search
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/post/{slug}', [PostController::class, 'show']);
//community
Route::get('/community/{slug}', [CommunityController::class, 'show']);

//blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
//project
Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/project/show/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/download/{name}', [ProjectController::class, 'download'])->name('project.download');
Route::get('/project/filter/category/{name}', [ProjectController::class, 'filterCategory'])->name('project.filterCategory');
//event
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/event/show/{id}',  [EventController::class, 'show'])->name('event.show');

//Connect
Route::get('/connect', [ConnectController::class, 'index'])->name('connect');
Route::get('/connect/job/{id}', [ConnectController::class, 'jobDetails'])->name('connect.job');
Route::get('/connect/student', [ConnectController::class, 'student'])->name('connect.student');
Route::get('/connect/alumni', [ConnectController::class, 'alumni'])->name('connect.alumni');
Route::get('/connect/professor', [ConnectController::class, 'professor'])->name('connect.professor');

//Connect public filter
Route::post('/connect/offersfilter', [ConnectFilterController::class, 'offersfilter'])->name('connect.offersfilter');


//ssl
Route::get('/.well-known/acme-challenge/{token}', function (string $token) {
    return \Illuminate\Support\Facades\Storage::get('public/.well-known/acme-challenge/' . $token);
})
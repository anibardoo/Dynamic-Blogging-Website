<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', [AdminController::class, 'show']);
Route::post('/', [AdminController::class, 'uploadUserInquiry'])->name('userInquiry');
//subscribe
Route::post('/subscribe', [AdminController::class, 'subscribe'])->name('subscribe');

Route::get('/dashboard', [AdminController::class, 'blogShow'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function () {
    //home route
    Route::post('/admin/home', [AdminController::class, 'upload'])->name('home')->middleware('admin');
    //feature route
    Route::post('/admin/feature', [AdminController::class, 'uploadFeature'])->name('feature');
    Route::get('/admin/feature/edit/{feature_id}', [AdminController::class, 'editFeatureData'])->name('feature.edit');
    Route::post('/admin/feature/update/{feature_id}', [AdminController::class, 'updateFeature'])->name('feature.update');
    Route::get('/admin/feature/delete/{feature_id}', [AdminController::class, 'deleteFeature'])->name('feature.delete');

    //contact
    Route::post('/admin/contact', [AdminController::class, 'uploadContact'])->name('contact');
    // project
    Route::post('/admin/project', [AdminController::class, 'uploadProject'])->name('project');
    //sendAds
    Route::post('/admin/ads', [AdminController::class, 'sendAds'])->name('sendAds');
    //submit checkbox
    Route::post('/broadcast', [AdminController::class, 'selectedBroadcast'])->name('broadcast');
    Route::get('/brodcast/delete/{subscriber_id}', [AdminController::class, 'deleteSubscriber'])->name('subscriber.delete');

    //send checked ads
    Route::post('/sendCheckedAds', [AdminController::class, 'sendCheckedAds'])->name('sendCheckedAds');
    //block and unblock user
    Route::get('/dashboard/user/block/{id}',[AdminController::class,'blockUser'])->name('block.user');
    Route::get('/dashboard/user/unblock/{id}',[AdminController::class,'unblockUser'])->name('unblock.user');
    //blogs publish reject
    Route::get('/dashboard/user/publish/{id}',[AdminController::class,'publishUser'])->name('publish.user');
    Route::get('/dashboard/user/reject/{id}',[AdminController::class,'rejectUser'])->name('reject.user');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin', function () {
    return view('welcome');
});


//blog route
Route::post('/admin/blog', [AdminController::class, 'uploadBlog'])->name('blog');
Route::get('/admin/blog/edit/{blog_id}', [AdminController::class, 'editBlogData'])->name('blog.edit');
Route::post('/admin/blog/update/{blog_id}', [AdminController::class, 'updateBlog'])->name('blog.update');
Route::get('/admin/blog/delete/{blog_id}', [AdminController::class, 'deleteBlog'])->name('blog.delete');

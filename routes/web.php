<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostManageController;
use App\Http\Controllers\ValidateController;
use App\Mail\ContactMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

Route::get('/', [HelloController::class, 'index']);

Route::get('enum', function () {
    $user = User::first();

    dump($user->rank->label());
    dump($user->rank->name);
    dump($user->rank->value);

});

Route::get('mail', function () {
    $user = User::first();

    Mail::send(new ContactMail($user));

    return 'done';
});

Route::get('/debug-user', function () {
    $user = Auth::user();

    if (!$user) {
        return response()->json(['error' => 'ユーザーがログインしていません'], 401);
    }

    dd($user);
});

Route::prefix('member')->middleware('auth')->name('member.')->group(function () {
    Route::resource('posts', PostManageController::class);
});

Route::get('member', function () {
    
    if(! Gate::allows('only-admin')) {
        abort(403);
    }

    $user = Auth::user();

    return view('member', compact('user'));
})->middleware('auth')->name('member');

Route::get('validate', [ValidateController::class, 'index'])->name('validate.index');
Route::post('validate', [ValidateController::class, 'indexPost']);



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('uuid', function () {
    $user = User::first();

    $post = new Post();
    $post->title = 'title';
    $post->body = 'body';
    $post->user_id = $user->id;
    $post->save();

    dd($post->toArray());
});

Route::get('uuid/{post:uuid}', function (Post $post) {
    dd($post->toArray());
});

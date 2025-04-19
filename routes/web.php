<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome', ['posts'=>Post::paginate(1)]);
})->name('home');

Route::get('/create', [PostController::class, 'create']);
Route::post('/store', [PostController::class, 'ourfilestore'])->name('store');


Route::get('/edit/{id}', [PostController::class, 'editdata'])->name('edit');


Route::post('/update/{id}', [PostController::class, 'updatedata'])->name('update');



Route::get('/delete/{id}', [PostController::class, 'deletedata'])->name('delete');



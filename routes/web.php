<?php


use App\Models\{Post, Category, User};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminCategoryController, PostController, CategoryController, LoginController, RegisterController, DashboardPostController};
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

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

    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'name' => 'Muhamad Rizki',
        'email' => 'rizkyzetzet121@gmail.com',
        'image' => 'rizkyzet.jpg'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => "Posts By Category : {$category->name}",
        'posts' => $category->posts,
    ]);
});


Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Posts By Author : {$author->name}",
        'posts' => $author->posts
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


Route::post('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth')->scoped(['post' => 'slug']);


Route::post('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->scoped(['category' => 'slug'])->middleware('auth');











Route::get('/tes', function () {
    return view('view_test.test');
});

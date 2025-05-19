<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StockController;


// use App\Http\Controllers\UserCont;
// use App

/*
|-----------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/hello', [WelcomeController::class, 'hello']);

// Route::get('mahasiswa', function ($id) {});
// Route::post('mahasiswa', function ($id) {});
// Route::put('mahasiswa', function ($id) {});
// Route::delete('mahasiswa', function ($id) {});
// Route::get('mahasiswa/{id}', function ($id) {});
// Route::put('mahasiswa/{id}', function ($id) {});
// Route::delete('mahasiswa/{id}', function ($id) {});


// Route::get('/hello', function () {
//     return 'Hello World';
// });
// Route::get('/world', function () {
//     return 'World';
// });

// Route::get('/', function () {
//     return 'Welcome RAHMAN THE QONQUIROR';
// });

// Route::get('/about', function () {
//     return 'SAFRIZAL RAHMAN THE QONQUIROR | 2341760151';
// });

// Route::get('/user/{name}', function ($name) {
//     return 'My name is ' . $name;
// });

// Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
//     return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
// });


// Route::get('/articles/{id}', function ($articlesId) {
//     return 'Artikel ke-' . $articlesId;
// });

// Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile');


// Route::get('/user/{name?}', function ($name = null) {
//     return 'My name is ' . $name;
// });

// Route::get('/user/{name?}', function ($name = 'John') {
//     return 'Nama saya- ' . $name;
// });

// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya- ' . $name;
// })->where('name', '^(?!profile$).*');


// // Route::get('/user/profile', function () {
// //     //
// // })->name('profile');

// // Route::get(
// //     '/user/profile',
// //     [UserProfileController::class, 'show']
// // )->name('profile');

// // // Generating URLs...
// // $url = route('profile');

// // // Generating Redirects...
// // return redirect()->route('profile');

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });
//     Route::get('/user/profile', function () {
//         // Uses first & second middleware...
//     });
// });
// Route::domain('{account}.example.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         //
//     });
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });


// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// Route::redirect('/here', '/there');

// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


// Route::get('/', [PageController::class, 'index']);
// Route::get('/about', [PageController::class, 'about']);
// Route::get('/articles/{id}', [PageController::class, 'articles']);


// Route::get('/', HomeController::class);
// Route::get('/about', AboutController::class);
// Route::get('/articles/{id}', ArticleController::class);

// Route::resource('photos', PhotoController::class);

// Route::resource('photos', PhotoController::class)->only([
//     'index',
//     'show'
// ]);
// Route::resource('photos', PhotoController::class)->except([
//     'create',
//     'store',
//     'update',
//     'destroy'
// ]);


// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'SAFRIZAL RAHMAN THE qonwueror']);
// });

// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'SAFRIZAL RAHMAN THE qonwueror']);
// });

// Route::get('/greeting', [WelcomeController::class,
// 'greeting']);

// PWLPOS

// Route::get ('/level', [LevelController::class, 'index' ]) ;
// Route :: get ('/level', [LevelController::class, 'index' ]);
// Route :: get ('/kategori', action: [KategoriController :: class, 'index' ]);
// // Route :: get ('/public/user', [UserController::class, 'index' ]);
// // Route :: get ('/user', [UserController::class, 'index' ]);
// Route::get('/user', [UserController::class, 'index'])->name('user.index');

// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.tambah_simpan');
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('user.ubah');
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('user.ubah_simpan');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');


// // JOBSHIT 5
// Route:: get ('/', [WelcomeController :: class,'index' ]);


// Route::group(['prefix'=>'user'], function(){
//     Route::get('/', [UserController::class, 'index']);
//     Route::post('/list', [UserController::class, 'list']);
//     Route::get('/create', [UserController::class, 'create']);
//     Route::post('/', [UserController::class, 'store']);
//     Route::get('/{id}', [UserController::class, 'show']);
//     Route::get('/{id}/edit', [UserController::class, 'edit']);
//     Route::put('/{id}', [UserController::class, 'update']);
//     Route::delete('/{id}', [UserController::class, 'destroy']);
// });
// AUTH

Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // JOBSHIT 6
    Route::get('/', [WelcomeController::class, 'index']);
    //Route m_level
    Route::middleware(['authorize:ADM'])->group(function (){
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [levelController::class, 'index']);
            Route::post('/list', [levelController::class, 'list']);
            Route::get('/create', [levelController::class, 'create']);
            Route::post('/', [levelController::class, 'store']);
            Route::get('/create_ajax', [levelController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [levelController::class, 'store_ajax']);    // Menyimpan data user baru Ajax
            Route::get('/{id}', [levelController::class, 'show']);
            Route::get('/{id}/edit', [levelController::class, 'edit']);
            Route::put('/{id}', [levelController::class, 'update']);
            Route::get('/{id}/edit_ajax', [levelController::class, 'edit_ajax']); //Menampilkan Halaman form Edit User AJAX
            Route::put('/{id}/update_ajax', [levelController::class, 'update_ajax']); //Menyimpan perubahan data User AJAX
            Route::get('/{id}/delete_ajax', [levelController::class, 'confirm_ajax']);
            Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
            Route::delete('/{id}/delete_ajax', [levelController::class, 'delete_ajax']);
            Route::delete('/{id}', [levelController::class, 'destroy']);
        });
    
    
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/list', [UserController::class, 'list']);
            Route::get('/create', [UserController::class, 'create']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']);    // Menyimpan data user baru Ajax
            Route::get('/{id}', [UserController::class, 'show']);
            Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);
            Route::get('/{id}/edit', [UserController::class, 'edit']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); //Menampilkan Halaman form Edit User AJAX
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); //Menyimpan perubahan data User AJAX
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
        });
});
   
    //Route m_kategori
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']);
        Route::post('/list', [KategoriController::class, 'list']);
        Route::get('/create', [KategoriController::class, 'create']);
        Route::post('/', [KategoriController::class, 'store']);
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);    // Menyimpan data user baru Ajax
        Route::get('/{id}', [KategoriController::class, 'show']);
        Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); //Menampilkan Halaman form Edit User AJAX
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); //Menyimpan perubahan data User AJAX
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });

    //m_barang
    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']);
            Route::post('/list', [BarangController::class, 'list']);
            Route::get('/create', [BarangController::class, 'create']);
            Route::post('/', [BarangController::class, 'store']);
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']);    // Menyimpan data user baru Ajax
            Route::get('/{id}', [BarangController::class, 'show']);
            Route::get('/{id}/edit', [BarangController::class, 'edit']);
            Route::put('/{id}', [BarangController::class, 'update']);
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); //Menampilkan Halaman form Edit User AJAX
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); //Menyimpan perubahan data User AJAX
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
            Route::delete('/{id}', [BarangController::class, 'destroy']);
            Route::get('/import', [BarangController::class, 'import']);
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
            Route::get('/export_excel', [BarangController::class,'export_excel']);
        });
    });
    //t_stok
    Route::group(['prefix' => 'stock'], function () {
        Route::get('/', [StockController::class, 'index']);
        Route::post('/list', [StockController::class, 'list']);
        Route::get('/create', [StockController::class, 'create']);
        Route::post('/', [StockController::class, 'store']);
        Route::get('/create_ajax', [StockController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [StockController::class, 'store_ajax']);    // Menyimpan data user baru Ajax
        Route::get('/{id}', [StockController::class, 'show']);
        Route::get('/{id}/edit', [StockController::class, 'edit']);
        Route::put('/{id}', [StockController::class, 'update']);
        Route::get('/{id}/edit_ajax', [StockController::class, 'edit_ajax']); //Menampilkan Halaman form Edit User AJAX
        Route::put('/{id}/update_ajax', [StockController::class, 'update_ajax']); //Menyimpan perubahan data User AJAX
        Route::get('/{id}/delete_ajax', [StockController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [StockController::class, 'delete_ajax']);
        Route::delete('/{id}', [StockController::class, 'destroy']);
        // Routes/web.php
        Route::middleware('auth')->post('stock', [StockController::class, 'store']);
    });
});
 
// // User routes group
// Route::group(['prefix' => 'user'], function () {
//     // Menampilkan halaman awal user
//     Route::get('/', [UserController::class, 'index']);

//     // Menampilkan data user dalam bentuk JSON untuk datatables
//     Route::post('/list', [UserController::class, 'list']);

//     // Menampilkan halaman form tambah user
//     Route::get('/create', [UserController::class, 'create']);

//     // Menyimpan data user baru
//     Route::post('/', [UserController::class, 'store']);

//     // Menampilkan detail user
//     Route::get('/{id}', [UserController::class, 'show']);

//     // Menampilkan halaman form edit user
//     Route::get('/{id}/edit', [UserController::class, 'edit']);

//     // Menyimpan perubahan data user
//     Route::put('/{id}', [UserController::class, 'update']);

//     // Menghapus data user
//     Route::delete('/{id}', [UserController::class, 'destroy']);

//     // Route::post('/user/list', [UserController::class, 'list'])->name('user.list');
// });
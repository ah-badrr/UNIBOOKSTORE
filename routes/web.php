<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use App\Models\Buku;
use App\Models\Penerbit;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [BukuController::class, 'dashboard'])->name('dashboard');
    Route::resource('/buku', BukuController::class);
    Route::resource('/penerbit', PenerbitController::class);

    Route::get('/admin', function () {
        $buku = Buku::all();
        $penerbit = Penerbit::all();

        return view('admin', compact('buku', 'penerbit'));
    })->name('admin');

    Route::get('/pengadaan', function () {
        $buku = Buku::orderBy('stok', 'asc')->limit(1)->get();
        return view('pengadaan', compact('buku'));
    })->name('pengadaan');
});

require __DIR__ . '/auth.php';

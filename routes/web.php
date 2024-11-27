<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelajarController;
use Illuminate\Support\Facades\Route;

// Halaman utama aplikasi
// Format route = Route::method('uri', action);
Route::get('/', [HomeController::class, 'homepage']);

// Halaman Login
// Route::get('/login', fn() => 'Ini halaman login');
// Route untuk memaparkan borang login
Route::get('/login', [LoginController::class, 'paparBorangLogin']);

// Route untuk mendapatkan data daripada borang login dan proses authentication
Route::post('/login', [LoginController::class, 'semakanDataLogin']);


// Module Pengurusan Pelajar

// Halaman untuk memaparkan senarai pelajar
Route::get('/pelajar/senarai', [PelajarController::class, 'index']);

// Halaman untuk memaparkan borang pendaftaran pelajar baru
Route::get('/pelajar/daftar', [PelajarController::class, 'create']);

// Route untuk terima data dan proses pendaftaran pelajar baru
Route::post('/pelajar/daftar', [PelajarController::class, 'store']);

// Route untuk memaparkan butiran pelajar berdasarkan ID
Route::get('/pelajar/{id}', [PelajarController::class, 'show']);

// Route untuk memaparkan borang kemaskini butiran pelajar berdasarkan ID
Route::get('/pelajar/{id}/edit', [PelajarController::class, 'edit']);

// Route untuk memaparkan borang kemaskini butiran pelajar berdasarkan ID
Route::patch('/pelajar/{id}/edit', [PelajarController::class, 'update']);

// Route untuk menghapus/padam rekod pelajar berdasarkan ID
Route::delete('/pelajar/{id}', [PelajarController::class, 'destroy']);

// Route resource untuk pelajar
// Route::resource('pelajar', PelajarController::class);


// Halaman dashboard
Route::get('/dashboard', function () {

    $pageTitle = '<h1>Dashboard</h1><script>alert("test. Anda di hack")</script>';

    // Senarai rekod pelajar
    $senaraiPelajar = [
        ['id' => 1, 'nama' => 'Ali', 'email' => 'ali@test.com', 'idpelajar' => 'ABC123', 'bidang' => 'Sains Komputer'],
        ['id' => 2, 'nama' => 'Abu', 'email' => 'abu@test.com', 'idpelajar' => 'ABC321', 'bidang' => 'Kejuruteraan Awam'],
        ['id' => 3, 'nama' => 'Siti', 'email' => 'siti@test.com', 'idpelajar' => 'ABC789', 'bidang' => 'Pengurusan Perniagaan'],
        ['id' => 4, 'nama' => 'Muthu', 'email' => 'muthu@test.com', 'idpelajar' => 'ABC654', 'bidang' => 'Matematik'],
        ['id' => 5, 'nama' => 'John', 'email' => 'john@test.com', 'idpelajar' => 'ABC841', 'bidang' => 'Elektronik'],
    ];

    // Cara 1 Attach Variable ke Template View
    // return view('template-dashboard')->with('senaraiPelajar', $senaraiPelajar);

    // Cara 2 Attach Variable ke Template View
    // return view('template-dashboard', ['senaraiPelajar' => $senaraiPelajar, 'pageTitle' => $pageTitle]);

    // Cara 3 Attach Variable ke Template View
    return view('template-dashboard', compact('senaraiPelajar', 'pageTitle'));

});

// Halaman logout
Route::get('/logout', fn() => 'Ini halaman logout');
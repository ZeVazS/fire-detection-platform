<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Http\Controllers\ZoneController;
use App\Http\Controllers\CameraController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Agora passa os users para a view
    $users = User::all();
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Exemplo de rota protegida só para super admin
    Route::get('/admin', function () {
        return 'Bem-vindo, Super Admin!';
    })->middleware('role:super_admin');

    // Exemplo de rota protegida para admin e super_admin
    Route::get('/management', function () {
        return 'Gestão de utilizadores e dados';
    })->middleware('role:super_admin,admin');

    // Rota de listagem de utilizadores
    Route::get('/users', function () {
        $users = User::all();
        return view('users.index', compact('users'));
    })->name('users.index');

    // Rota de Camaras
    Route::resource('zones', ZoneController::class);
    Route::resource('zones.cameras', CameraController::class);
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Rotas Protegidas (Autenticadas)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile do Usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestão de Usuários
    Route::middleware(['permission:usuarios.visualizar'])->get('/users', [UserController::class, 'index'])->name('users.index');
    Route::middleware(['permission:usuarios.criar'])->get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::middleware(['permission:usuarios.criar'])->post('/users', [UserController::class, 'store'])->name('users.store');
    Route::middleware(['permission:usuarios.editar'])->get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::middleware(['permission:usuarios.editar'])->put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::middleware(['permission:usuarios.excluir'])->delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Gestão de Perfis (Roles)
    Route::middleware(['permission:perfis.visualizar'])->get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::middleware(['permission:perfis.criar'])->get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::middleware(['permission:perfis.criar'])->post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::middleware(['permission:perfis.editar'])->get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::middleware(['permission:perfis.editar'])->put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::middleware(['permission:perfis.excluir'])->delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // Gestão de Permissões
    Route::middleware(['permission:permissoes.visualizar'])->get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::middleware(['permission:permissoes.criar'])->get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::middleware(['permission:permissoes.criar'])->post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::middleware(['permission:permissoes.editar'])->get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::middleware(['permission:permissoes.editar'])->put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::middleware(['permission:permissoes.excluir'])->delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
});
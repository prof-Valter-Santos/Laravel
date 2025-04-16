<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

//Rota para Pagina Home
Route::get('/', [userController::class, 'index'])->name('user.index');
//Rota para Criar Usuário (Create)
Route::get('/create-user', [userController::class, 'create'])->name('user.create');
Route::post('/store-user', [userController::class, 'store'])->name('user.store');
//Rota para Visualizar Usuário (Read)
Route::get('/show-user/{user}', [userController::class, 'show'])->name('user.show');
//Rota para Editar Usuário (Create)
Route::get('/edit-user/{user}', [userController::class, 'edit'])->name('user.edit');
//Rota para Atualizar Usuário (Update)
Route::put('/update-user/{user}', [userController::class, 'update'])->name('user.update');
//Rota para Excluir Usuário (Delete)
Route::delete('/destroy-user/{user}', [userController::class, 'destroy'])->name('user.destroy');


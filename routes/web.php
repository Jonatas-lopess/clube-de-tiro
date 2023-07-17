<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\ClubeController;

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

Route::get('/', [ClubeController::class, 'homeAction'])->name('home');
Route::get('contato', [ClubeController::class, 'contatoAction'])->name('contato');
Route::get('sobre', [ClubeController::class, 'sobreAction'])->name('sobre');
Route::get('servicos', [ClubeController::class, 'servicosAction'])->name('servicos');

Route::prefix('formulario')->group(function () {
    Route::get('/', [ClubeController::class, 'formularioAction'])->name('formulario');
    Route::post('/salvar', [ClubeController::class, 'salvar'])->name('formulario.salvar');
});

Auth::routes();

Route::prefix('painel')->name('painel.')->group(function () {
    Route::get('/usuarios', [PainelController::class, 'usersSectionContent'])->name('usuarios');
    Route::get('/home', [PainelController::class, 'homeSectionContent'])->name('home');
    Route::get('/sobre-nos', [PainelController::class, 'aboutUsSectionContent'])->name('about-us');
    Route::get('/contato', [PainelController::class, 'contactSectionContent'])->name('contact');
    Route::get('/servicos', [PainelController::class, 'serviceSectionContent'])->name('service');
    Route::get('/get-users', [PainelController::class, 'getUsers'])->name('get-users');
    Route::get('/carrossel-imagens', [PainelController::class, 'getCarouselImages'])->name('carrossel-imagens');
    Route::get('/get-services', [PainelController::class, 'getServices'])->name('get-services');
    Route::post('/service-delete', [PainelController::class, 'deleteService'])->name('service-delete');
    Route::post('/service-update', [PainelController::class, 'updateService'])->name('service-update');
    Route::post('/salvar-service', [PainelController::class, 'salvarService'])->name('salvar-service');
    Route::post('/salvar-about', [PainelController::class, 'salvarAboutUs'])->name('salvar-about');
    Route::post('/salvar-contact', [PainelController::class, 'salvarContact'])->name('salvar-contact');
    Route::post('/user-update', [RegisterController::class, 'update'])->name('user-update');
    Route::post('/user-delete', [RegisterController::class, 'delete'])->name('user-delete');
    Route::post('/upload-image', [PainelController::class, 'uploadImage'])->name('upload-image');
    Route::post('/upload-image-tmp', [PainelController::class, 'uploadTemporaryImage'])->name('upload-image-tmp');
    Route::delete('/upload-image-tmp', [PainelController::class, 'deleteTemporaryImage'])->name('delete-image-tmp');
    Route::post('/imagem-delete', [PainelController::class, 'deleteImage'])->name('imagem-delete');
    Route::post('/update-qrcode', [PainelController::class, 'updateQRCode'])->name('update-qrcode');
});

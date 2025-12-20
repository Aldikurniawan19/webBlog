<?php

use App\Livewire\ArtikelCreate;
use App\Livewire\ArtikelDetail;
use App\Livewire\ArtikelEdit;
use App\Livewire\ArtikelPage;
use App\Livewire\HomePage;
use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('artikel')->group(function () {
        Route::get('/', ArtikelPage::class)->name('artikel');
        Route::get('/{slug}/detail', ArtikelDetail::class)->name('artikel.detail');
        Route::get('/create', ArtikelCreate::class)->name('artikel.create');
        Route::get('/{slug}/edit', ArtikelEdit::class)->name('artikel.edit');
    });
});

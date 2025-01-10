<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home\Index;
use App\Livewire\Pages\Assistant\Chat;

Route::get('/', Index::class)->name('home');
Route::get('/assistant', Chat::class)->name('chat.assistant');
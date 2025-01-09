<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Home\Index;

Route::get('/', Index::class)->name('home');
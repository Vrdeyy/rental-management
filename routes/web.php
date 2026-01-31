<?php

use App\Livewire\ItemListing;
use Illuminate\Support\Facades\Route;
use App\Livewire\ItemDetail;

Route::get('/', ItemListing::class);
Route::get('/items/{id}', ItemDetail::class);
<?php

use App\Livewire\Counter;
use App\Livewire\Produtos\Create;
use App\Livewire\Produtos\Edit;
use App\Livewire\Produtos\Index;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/counter', Counter::class);

Route::get('/home', Index::class)->name('produtos.index');

Route::get('/produtos/{produto}/editar', Edit::class)->name('produtos.edit');

Route::get('/home/criar', Create::class)->name('produtos.create');

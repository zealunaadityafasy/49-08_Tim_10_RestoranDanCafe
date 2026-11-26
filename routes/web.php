<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return redirect('/pegawai');
});

Route::resource('/pegawai', PegawaiController::class)
    ->except(['show']);

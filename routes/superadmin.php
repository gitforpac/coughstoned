<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('superadmin')->user();

    //dd($users);

    return view('superadmin.home');
})->name('home');


<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('adventurer')->user();

    //dd($users);

    return view('adventurer.home');
})->name('home');


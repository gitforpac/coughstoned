
<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('index'));
});

// Home > Adventures
Breadcrumbs::register('adventures', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Adventures', route('adventures'));
});

// the team
Breadcrumbs::register('theteam', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('The Team', route('theteam'));
});


// Home > Contact Us
Breadcrumbs::register('contactus', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact Us', route('contactus'));
});

// Home > Blog
Breadcrumbs::register('adventure', function ($breadcrumbs,$adventure) {
    $breadcrumbs->parent('adventures');
    $breadcrumbs->push($adventure->name, route('adventure',$adventure->id));
});

// Home > Blog > [Category]
Breadcrumbs::register('book', function ($breadcrumbs,$adventure) {
    $breadcrumbs->parent('adventure', $adventure);
    $breadcrumbs->push('Book', route('book',$adventure->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::register('post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('category', $post->category);
    $breadcrumbs->push($post->title, route('post', $post));
});

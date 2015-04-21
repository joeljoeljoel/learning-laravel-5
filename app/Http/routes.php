<?php

Route::get('foo', ['middleware' => 'manager', function() {
    return 'Only a manager may access this page.';
}]);

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
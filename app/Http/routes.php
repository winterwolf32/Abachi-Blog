<?php

get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::group(['prefix' => 'api'], function(){

    get('posts', [
        'as' => 'posts',
        'uses' => 'PostsController@all'
    ]);

    get('posts/{slug}', [
        'as' => 'post',
        'uses' => 'PostsController@post'
    ]);

    get('tag/{tag}', [
        'as' => 'tag',
        'uses' => 'PostsController@tag'
    ]);

});
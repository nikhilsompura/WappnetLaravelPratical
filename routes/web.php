<?php


Route::get('/', 'HomeController@index')->name('mainhome');


Route::get('posts', 'PostController@index')->name('post.index');
Route::get('post/{slug}', 'PostController@details')->name('post.details');
Route::get('posts-by-category/{slug}', 'PostController@postsByCategory')->name('posts.by.category');
Route::get('posts-by-tag/{slug}', 'PostController@postsByTag')->name('posts.by.tag');

Auth::routes();

Route::resource('subscriber', 'SubscriberController')->only(['store']);

Route::group(
  [
    'middleware' => ['auth']
  ],
  function () {
    Route::post('favourite/{post}/add', 'FavouriteController@add')->name('favourite.post');
    Route::post('comment/{post}', 'CommentController@store')->name('comment.store');

  }
);

Route::group(
  [
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin']
  ],
  function () {
    Route::get('dashboard', 'AdminDashboardController@index')
      ->name('dashboard');
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('subscriber', 'SubscriberController')->only(['index', 'destroy']);
    Route::resource('comments', 'CommentController')->only(['index', 'destroy']);

    Route::get('settings', 'SettingsController@index')
      ->name('settings.index');
    Route::put('profile-update', 'SettingsController@updateProfile')
      ->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')
      ->name('password.update');

    Route::get('favourite-posts', 'FavouriteController@index')
      ->name('favourite.posts');
    Route::delete('delete-favourite-posts/{post}', 'FavouriteController@removePostFromFavoriteList')
      ->name('remove.favourite.posts');

    Route::get('pending/post', 'PostController@pending')->name('post.pending');
    Route::put('post/{post}/approve}', 'PostController@approval')->name('post.approve');
  }
);

Route::group(
  [
    'as' => 'author.',
    'prefix' => 'author',
    'namespace' => 'Author',
    'middleware' => ['auth', 'author']
  ],
  function () {
    Route::get('dashboard', 'AuthorDashboardController@index')
      ->name('dashboard');
    Route::resource('post', 'PostController');
    Route::resource('comments', 'CommentController')->only(['index', 'destroy']);

    Route::get('settings', 'SettingsController@index')
      ->name('settings.index');
    Route::put('profile-update', 'SettingsController@updateProfile')
      ->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')
      ->name('password.update');

    Route::get('favourite-posts', 'FavouriteController@index')
      ->name('favourite.posts');
    Route::delete('delete-favourite-posts/{post}', 'FavouriteController@removePostFromFavoriteList')
      ->name('remove.favourite.posts');
  }
);

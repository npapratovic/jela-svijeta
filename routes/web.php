<?php
Route::get('/', function () { return redirect('/admin/home'); });

Route::get('/apiendpoints', 'HomeController@apiLinks')->name('apiendpoints');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('languages', 'Admin\LanguagesController');
    Route::post('languages_mass_destroy', ['uses' => 'Admin\LanguagesController@massDestroy', 'as' => 'languages.mass_destroy']);
    Route::post('languages_restore/{id}', ['uses' => 'Admin\LanguagesController@restore', 'as' => 'languages.restore']);
    Route::delete('languages_perma_del/{id}', ['uses' => 'Admin\LanguagesController@perma_del', 'as' => 'languages.perma_del']);
    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoriesController@massDestroy', 'as' => 'categories.mass_destroy']);
    Route::post('categories_restore/{id}', ['uses' => 'Admin\CategoriesController@restore', 'as' => 'categories.restore']);
    Route::delete('categories_perma_del/{id}', ['uses' => 'Admin\CategoriesController@perma_del', 'as' => 'categories.perma_del']);
    Route::resource('tags', 'Admin\TagsController');
    Route::post('tags_mass_destroy', ['uses' => 'Admin\TagsController@massDestroy', 'as' => 'tags.mass_destroy']);
    Route::post('tags_restore/{id}', ['uses' => 'Admin\TagsController@restore', 'as' => 'tags.restore']);
    Route::delete('tags_perma_del/{id}', ['uses' => 'Admin\TagsController@perma_del', 'as' => 'tags.perma_del']);
    Route::resource('ingredients', 'Admin\IngredientsController');
    Route::post('ingredients_mass_destroy', ['uses' => 'Admin\IngredientsController@massDestroy', 'as' => 'ingredients.mass_destroy']);
    Route::post('ingredients_restore/{id}', ['uses' => 'Admin\IngredientsController@restore', 'as' => 'ingredients.restore']);
    Route::delete('ingredients_perma_del/{id}', ['uses' => 'Admin\IngredientsController@perma_del', 'as' => 'ingredients.perma_del']);
    Route::resource('meals', 'Admin\MealsController');
    Route::post('meals_mass_destroy', ['uses' => 'Admin\MealsController@massDestroy', 'as' => 'meals.mass_destroy']);
    Route::post('meals_restore/{id}', ['uses' => 'Admin\MealsController@restore', 'as' => 'meals.restore']);
    Route::delete('meals_perma_del/{id}', ['uses' => 'Admin\MealsController@perma_del', 'as' => 'meals.perma_del']);



 
});

<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('roles', 'RolesController', ['except' => ['create', 'edit']]);

        Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);

        Route::resource('languages', 'LanguagesController', ['except' => ['create', 'edit']]);

        Route::resource('categories', 'CategoriesController', ['except' => ['create', 'edit']]);

        Route::resource('tags', 'TagsController', ['except' => ['create', 'edit']]);

        Route::resource('ingredients', 'IngredientsController', ['except' => ['create', 'edit']]);

        Route::resource('meals', 'MealsController', ['except' => ['create', 'edit']]);

});

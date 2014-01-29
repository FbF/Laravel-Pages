<?php

Route::any('{uri}', 'Fbf\LaravelPages\PagesController@view')->where('uri', Config::get('laravel-pages::route'));
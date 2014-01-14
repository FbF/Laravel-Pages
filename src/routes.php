<?php

Route::any('{slug}', 'Fbf\LaravelPages\PagesController@view')->where('slug', '([A-z\d-\/_.]+)?');
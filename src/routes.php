<?php

Route::any('{uri}', 'Fbf\LaravelPages\PagesController@view')->where('uri', '([A-z\d-\/_.]+)?');
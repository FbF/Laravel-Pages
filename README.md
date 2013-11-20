Laravel-Pages
=============

A Laravel 4 package for adding simple pages to a website with banner image, heading, main image or YouTube video and body content.

## Features

* Pages can be draft or published
* They have a published date that you can set in the future for delayed/scheduled publishing
* Page slugs can be automatically created from the page heading
* Control page title, meta description and keywords for SEO purposes
* Uses soft deletes in case you need to retrieve old content
* Configure the rendered view so you can use one in your app rather than the one in the package
* Make use of 2 partials in your own view so you can add extra stuff around

## Comes with a

* Migration for creating the fbf_pages table
* Model, controller and view (main view and 2 partials for content and banner image)
* Built in route (currently catches anything from the root of the site, so include the ServiceProvider last in the list if other packages have routes that this would interfere with)
* Service provider that automatically registers the sluggable

## Installation

Add the following to you composer.json file

    "fbf/laravel-pages": "dev-master"

Run

    composer update

Add the following to app/config/app.php

    'Fbf\LaravelPages\LaravelPagesServiceProvider'

Publish the config

    php artisan config:publish fbf/laravel-pages

## Configuration

The view that should be rendered for the pages. You can use the bundled view, or specify your own and use @include('laravel-pages::page') to get the whole page with content and banner image, or individually @include('laravel-pages::banner') and @include('laravel-pages::content')

	'view' => 'laravel-pages::page',

## Administrator

You can use the excellent Laravel Administrator package by frozennode to administer your blog.

http://administrator.frozennode.com/docs/installation

A ready-to-use model config file for the Page model (pages.php) is provided in the src/config/administrator directory of the package, which you can copy into the app/config/administrator directory (or whatever you set as the model_config_path in the administrator config file).
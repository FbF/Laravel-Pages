Laravel-Pages
=============

A Laravel 4 package for adding simple pages to a website with banner image, heading, main image or YouTube video and body content.

## Features

* Pages can be draft or approved
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

Run the migration

    php artisan migrate --package="fbf/laravel-pages"

Create the relevant image upload directories that you specify in your config, e.g.

    public/uploads/packages/fbf/laravel-pages/banner/originals
    public/uploads/packages/fbf/laravel-pages/banner/resized
    public/uploads/packages/fbf/laravel-pages/main/originals
    public/uploads/packages/fbf/laravel-pages/main/resized

## Configuration

The view that should be rendered for the pages. You can use the bundled view, or specify your own and use @include('laravel-pages::page') to get the whole page with content and banner image, or individually @include('laravel-pages::banner') and @include('laravel-pages::content')

	'view' => 'laravel-pages::page',

## Administrator

You can use the excellent Laravel Administrator package by frozennode to administer your pages.

http://administrator.frozennode.com/docs/installation

A ready-to-use model config file for the Page model (pages.php) is provided in the src/config/administrator directory of the package, which you can copy into the app/config/administrator directory (or whatever you set as the model_config_path in the administrator config file).

## Extending

Let's say each page in your site can have a testimonial on it.

* After installing the package you can create the testimonials table and model etc (or use the fbf/laravel-testimonials package)
* Create the migration to add a testimonial_id field to the fbf_pages table, and run it

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkPagesToTestimonials extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fbf_pages', function(Blueprint $table)
		{
			$table->integer('testimonial_id')->nullable()->default(null);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fbf_pages', function(Blueprint $table)
		{
			$table->dropColumn('testimonial_id');
		});
	}

}
```

* Create a model in you app/models directory that extends the package model and includes the relationship

```php
<?php

class Page extends Fbf\LaravelPages\Page {

	public function testimonial()
	{
		return $this->belongsTo('Fbf\LaravelTestimonials\Testimonial');
	}

}
```

* If you are using FrozenNode's Administrator package, update the pages config file to use your new model, and to allow selecting the testimonial to attach to the page:

```php
	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Page',
```
...
```php
		'testimonial' => array(
			'title' => 'Testimonial',
			'type' => 'relationship',
			'name_field' => 'title',
		),
```

* Finally, update the IoC Container to inject an instance of your model into the controller, instead of the package's model
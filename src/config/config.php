<?php

return array(

	/**
	 * The pattern to find matching routes. By default it's anything except the root route, i.e. '/'
	 */
	'route' => '([A-z\d-\/_.]+)', // use '([A-z\d-\/_.]+)?' with the question mark on the end to match homepage too

	/**
	 * The view that should be rendered. You can change this to a view in your app
	 * and in there you can @include the partials that the laravel-pages::view view
	 * uses, i.e. laravel-pages::banner and laravel-pages::content.
	 */
	'view_page' => 'laravel-pages::page',

	/**
	 * YouTube Embed Player code used if a page has a You Tube Video ID set
	 * instead of a Main Image. Changing the settings will apply to all pages that
	 * have a You Tube Video on them. The placeholder "%YOU_TUBE_VIDEO_ID%" is
	 * replaced with the You Tube Video ID in the database for this page.
	 */
	'you_tube_embed_code' => '<iframe width="560" height="315" src="//www.youtube.com/embed/%YOU_TUBE_VIDEO_ID%?rel=0" frameborder="0" allowfullscreen></iframe>',

	/**
	 * The path, relative to the public_path() directory, where the original uploaded main images are stored.
	 */
	'main_image_originals_dir' => '/uploads/packages/fbf/laravel-pages/main/originals/',

	/**
	 * The path, relative to the public_path() directory, where the resized main images are stored.
	 */
	'main_image_resized_dir' => '/uploads/packages/fbf/laravel-pages/main/resized/',

	/**
	 * The max width of the main images. The resized version of main images will fit within this size
	 */
	'main_image_max_width' => 450,

	/**
	 * The max height of the main images. The resized version of main images will fit within this size
	 */
	'main_image_max_height' => 450,

	/**
	 * The path, relative to the public_path() directory, where the original uploaded banner images are stored.
	 */
	'banner_image_originals_dir' => '/uploads/packages/fbf/laravel-pages/banner/originals/',

	/**
	 * The path, relative to the public_path() directory, where the resized banner images are stored.
	 */
	'banner_image_resized_dir' => '/uploads/packages/fbf/laravel-pages/banner/resized/',

	/**
	 * The width of the banner images.
	 */
	'banner_image_width' => 950,

	/**
	 * The height of the banner images.
	 */
	'banner_image_height' => 300,

);
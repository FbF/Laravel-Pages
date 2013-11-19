<?php

return array(

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
	 * The path, relative to the public_path() directory, where the main images are
	 * stored.
	 */
	'main_image_dir' => 'uploads/packages/fbf/laravel-pages/main/resized',

	/**
	 * The path, relative to the public_path() directory, where the banner images are
	 * stored.
	 */
	'banner_image_dir' => 'uploads/fbf_pages/banners/resized',

	/**
	 * The width of the banner images.
	 */
	'banner_image_width' => 950,

	/**
	 * The height of the banner images.
	 */
	'banner_image_height' => 300,

);
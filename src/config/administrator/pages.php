<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Pages',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'page',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelPages\Page',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'heading' => array(
			'title' => 'Heading',
		),
		'slug' => array(
			'title' => 'Slug',
		),
		'published_date' => array(
			'title' => 'Published',
		),
		'status' => array(
			'title' => 'Status',
		),
		'updated_at' => array(
			'title' => 'Last Updated',
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'heading' => array(
			'title' => 'Heading',
			'type' => 'text',
		),
		'banner_image' => array(
			'title' => 'Banner Image',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . '/uploads/packages/fbf/laravel-pages/banner/originals/',
			'size_limit' => 5,
			'sizes' => array(
				array(950, 300, 'crop', public_path() . '/uploads/packages/fbf/laravel-pages/banner/resized/', 100),
			),
		),
		'banner_image_alt' => array(
			'title' => 'Banner Image ALT text',
			'type' => 'text',
		),
		'main_image' => array(
			'title' => 'Main Image',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . '/uploads/packages/fbf/laravel-pages/main/originals/',
			'size_limit' => 5,
			'sizes' => array(
				array(450, 450, 'fit', public_path() . '/uploads/packages/fbf/laravel-pages/main/resized/', 100),
			),
		),
		'main_image_alt' => array(
			'title' => 'Main Image ALT text',
			'type' => 'text',
		),
		'you_tube_video_id' => array(
			'title' => 'YouTube Video ID',
			'type' => 'text',
		),
		'content' => array(
			'title' => 'Content',
			'type' => 'wysiwyg',
		),
		'slug' => array(
			'title' => 'Slug',
			'type' => 'text',
			'visible' => function($model)
			{
				return $model->exists;
			},
		),
		'page_title' => array(
			'title' => 'Page Title',
			'type' => 'text',
		),
		'meta_description' => array(
			'title' => 'Meta Description',
			'type' => 'textarea',
		),
		'meta_keywords' => array(
			'title' => 'Meta Keywords',
			'type' => 'textarea',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelPages\Page::DRAFT => 'Draft',
				Fbf\LaravelPages\Page::APPROVED => 'Approved',
			),
		),
		'published_date' => array(
			'title' => 'Published Date',
		    'type' => 'datetime',
		    'date_format' => 'yy-mm-dd', //optional, will default to this value
		    'time_format' => 'HH:mm',    //optional, will default to this value
		),
		'created_at' => array(
			'title' => 'Created',
			'type' => 'datetime',
			'editable' => false,
		),
		'updated_at' => array(
			'title' => 'Updated',
			'type' => 'datetime',
			'editable' => false,
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
		'heading' => array(
			'title' => 'Heading',
		),
		'content' => array(
			'type' => 'text',
			'title' => 'Content',
		),
		'published_date' => array(
			'title' => 'Published Date',
			'type' => 'date',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelPages\Page::DRAFT => 'Draft',
				Fbf\LaravelPages\Page::APPROVED => 'Approved',
			),
		),
	),

	/**
	 * The width of the model's edit form
	 *
	 * @type int
	 */
	'form_width' => 500,

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'updated_at',
		'direction' => 'desc',
	),

	/**
	 * If provided, this is run to construct the front-end link for your model
	 *
	 * @type function
	 */
	'link' => function($model)
	{
		return URL::to($model->slug);
	},

);
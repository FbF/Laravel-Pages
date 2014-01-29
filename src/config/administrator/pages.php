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
		'uri' => array(
			'title' => 'URI',
		),
		'published_date' => array(
			'title' => 'Published',
		),
		'status' => array(
			'title' => 'Status',
			'select' => "CASE (:table).status WHEN '".Fbf\LaravelPages\Page::APPROVED."' THEN 'Approved' WHEN '".Fbf\LaravelPages\Page::DRAFT."' THEN 'Draft' END",
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
			'location' => public_path() . Config::get('laravel-pages::banner_image_originals_dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-pages::banner_image_width'),
					Config::get('laravel-pages::banner_image_height'),
					'crop',
					public_path() . Config::get('laravel-pages::banner_image_resized_dir'),
					100
				),
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
			'location' => public_path() . Config::get('laravel-pages::main_image_originals_dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-pages::main_image_max_width'),
					Config::get('laravel-pages::main_image_max_height'),
					'auto',
					public_path() . Config::get('laravel-pages::main_image_resized_dir'),
					100
				),
			),
		),
		'main_image_alt' => array(
			'title' => 'Main Image ALT text',
			'type' => 'text',
		),
		'you_tube_video_id' => array(
			'title' => 'YouTube Video ID (Takes precedence over the main image if it\'s populated)',
			'type' => 'text',
		),
		'content' => array(
			'title' => 'Content',
			'type' => 'wysiwyg',
		),
		'uri' => array(
			'title' => 'URI',
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
			'type' => 'date',
		),
	),

	/**
	 * The width of the model's edit form
	 *
	 * @type int
	 */
	'form_width' => 500,

	/**
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'heading' => 'required|max:255',
		'banner_image' => 'max:255',
		'banner_image_alt' => 'max:255',
		'main_image' => 'max:255',
		'main_image_alt' => 'max:255',
		'you_tube_video_id' => 'max:255',
		'status' => 'required|in:'.Fbf\LaravelPages\Page::DRAFT.','.Fbf\LaravelPages\Page::APPROVED,
		'published_date' => 'required|date_format:"Y-m-d H:i:s"|date',
	),

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
			return $model->getUrl();
		},

);



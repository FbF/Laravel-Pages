<?php namespace Fbf\LaravelPages;

class Page extends \Eloquent {

	const DRAFT 	= 'DRAFT';
	const APPROVED 	= 'APPROVED';

	protected $table = 'fbf_pages';

	public static $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    protected $oldMainImage;

	public static function boot()
	{
		parent::boot();

		static::created(function($page)
		{
			if (!empty($page->main_image))
			{
				$page->updateMainImageSize();
			}
		});

		static::updating(function($page)
		{
			$page->oldMainImage = $page->main_image;
			return true;
		});

		static::updated(function($member)
		{
			if ($page->oldMainImage <> $page->main_image)
			{
				$page->updateMainImageSize();
			}
		});

	}

	protected function updateMainImageSize()
	{	return;
		$pathToMainImage = public_path() . \Config::get('laravel-pages::main_image_dir') . DIRECTORY_SEPARATOR . $page->main_image;
		if (file_exists($pathToMainImage))
		{
			list($width, $height) = getimagesize($pathToMainImage);
			$page->main_image_width = $width;
			$page->main_image_height = $height;
			$page->save();
		}
	}

}
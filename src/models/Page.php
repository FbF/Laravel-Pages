<?php namespace Fbf\LaravelPages;

class Page extends \Eloquent {

	const DRAFT 	= 'DRAFT';
	const APPROVED 	= 'APPROVED';

	protected $table = 'fbf_pages';

	public static $sluggable = array(
        'build_from' => 'heading',
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

		static::updated(function($page)
		{
			if ($page->oldMainImage <> $page->main_image)
			{
				$page->updateMainImageSize();
			}
		});

	}

	protected function updateMainImageSize()
	{
		$pathToMainImage = public_path() . \Config::get('laravel-pages::main_image_dir') . DIRECTORY_SEPARATOR . $this->main_image;
		if (file_exists($pathToMainImage))
		{
			list($width, $height) = getimagesize($pathToMainImage);
			$this->main_image_width = $width;
			$this->main_image_height = $height;
			$this->save();
		}
	}

	/**
	 * Returns the page object for the given slug
	 * @param $slug
	 * @return mixed
	 */
	public static function get($slug)
	{
		return self::where('slug','=',$slug)
			->where('status','=',Page::APPROVED)
			->where('published_date','<=',\Carbon\Carbon::today())
			->first();
	}

}
<?php namespace Fbf\LaravelPages;

class Page extends \Eloquent {

	/**
	 * Status values for the database
	 */
	const DRAFT 	= 'DRAFT';
	const APPROVED 	= 'APPROVED';

	/**
	 * Name of the table to use for this model
	 * @var string
	 */
	protected $table = 'fbf_pages';

	/**
	 * @var bool
	 */
	protected $softDelete = true;

	/**
	 * Used for Cviebrock/EloquentSluggable
	 * @var array
	 */
	public static $sluggable = array(
        'build_from' => 'heading',
        'save_to'    => 'slug',
        'separator' => '-',
        'unique' => true,
        'include_trashed' => true,
    );

	/**
	 * Used to store the old main image value, set during model updating event before the model is actually updated
	 * Used to compare with the new main image value after saving the model, so we can work out whether we need to
	 * recalculate the image width and height
	 * @var string
	 */
	protected $oldMainImage = null;

	/**
	 *
	 */
	public static function boot()
	{
		parent::boot();

		static::created(function($page)
		{
			// If the record is being created and there is a "main image" supplied, set it's width and height
			if (!empty($page->main_image))
			{
				$page->updateMainImageSize();
			}
		});

		static::updating(function($page)
		{
			// If the record is about to be updated and there is a "main image" supplied, get the current main image
			// value so we can compare it to the new one
			$page->oldMainImage = self::where('id','=',$page->id)->first()->pluck('main_image');
			return true;
		});

		static::updated(function($page)
		{
			// If the main image has changed, and the save was successful, update the database with the new width and height
			if (isset($page->oldMainImage) && $page->oldMainImage <> $page->main_image)
			{
				$page->updateMainImageSize();
			}
		});

	}

	/**
	 * Triggered from madel save events, it updates the main image width and height fields to the values of the
	 * uploaded image.
	 */
	protected function updateMainImageSize()
	{
		// Get path to main image
		$pathToMainImage = public_path() . \Config::get('laravel-pages::main_image_resized_dir') . $this->main_image;
		if (is_file($pathToMainImage) && file_exists($pathToMainImage))
		{
			list($width, $height) = getimagesize($pathToMainImage);
		}
		else
		{
			$width = $height = null;
		}
		// Update the database, use DB::table()->update approach so as not to trigger the Eloquent save() event again.
		\DB::table($this->getTable())
			->where('id', $this->id)
			->update(array(
				'main_image_width' => $width,
				'main_image_height' => $height,
			));
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
			->where('published_date','<=',\Carbon\Carbon::now())
			->first();
	}

	/**
	 * Returns the URL of the current instance
	 * @return mixed
	 */
	public function getUrl()
	{
		return \URL::action('Fbf\LaravelPages\PagesController@view', array('slug' => $this->slug));
	}

}
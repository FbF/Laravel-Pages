<?php namespace Fbf\LaravelPages;

class PagesController extends \BaseController {

	protected $page;

	public function __construct(Page $page)
	{
		$this->page = $page;
	}

	public function view($slug)
	{
		$page = $this->page->get($slug);
		if (!$page)
		{
			\App::abort(404);
		}
		return \View::make(\Config::get('laravel-pages::view_page'))->with(compact('page'));
	}

}
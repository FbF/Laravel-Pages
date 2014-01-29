<?php namespace Fbf\LaravelPages;

class PagesController extends \BaseController {

	protected $page;

	public function __construct(Page $page)
	{
		$this->page = $page;
	}

	public function view($uri)
	{
		if (substr($uri,0,1) != '/')
		{
			$uri = '/' . $uri;
		}
		$page = $this->page->get($uri);
		if (!$page)
		{
			\App::abort(404);
		}
		return \View::make(\Config::get('laravel-pages::view_page'))->with(compact('page'));
	}

}
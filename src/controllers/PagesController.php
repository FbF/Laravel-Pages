<?php namespace Fbf\LaravelPages;

class PagesController extends \BaseController {

	public function view($slug)
	{
		$page = Page::get($slug);
		if (!$page)
		{
			\App::abort(404);
		}
		return \View::make(\Config::get('laravel-pages::view_page'))->with(compact('page'));
	}

}
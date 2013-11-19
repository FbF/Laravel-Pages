<?php namespace Fbf\LaravelPages;

class PagesController extends \BaseController {

	public function view($slug)
	{
		$page = Page::where('slug','=',$slug)
			->where('status','=',Page::APPROVED)
			->where('published_date','<=',\Carbon\Carbon::today())
			->first();
		if (!$page)
		{
			\App::abort(404);
		}
		return \View::make(\Config::get('laravel-pages::view_page'))->with(compact('page'));
	}

}
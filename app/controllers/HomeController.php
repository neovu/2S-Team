<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		// Get all the blog posts
		$posts = Post::with(array(
			'author' => function($query)
			{
				$query->withTrashed();
			},
		))->orderBy('created_at', 'DESC')->paginate();

		return View::make('frontend.pages.home', compact('posts'));
	}
}
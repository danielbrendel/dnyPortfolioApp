<?php

/*
    Asatru PHP - Blog Controller
*/

class BlogController extends BaseController {
	const INDEX_LAYOUT = 'layout';

	/**
	 * Perform base initialization
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct(self::INDEX_LAYOUT);

		if (!env('APP_ENABLE_BLOG')) {
			abort(403);
			exit();
		}
	}

    /**
	 * Handles URL: /blog/posts/fetch
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function fetch($request)
	{
		try {
			$blogposts = Blog::fetch();

            return json([
                'code' => 200,
                'data' => $blogposts->asArray()
            ]);
		} catch (\Exception $e) {
			return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
		}
	}

	/**
	 * Handles URL: /blog/{slug}
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler|Asatru\View\RedirectHandler
	 */
	public function post($request)
	{
		try {
			$slug = $request->arg('slug');

			$post = Blog::fromSlug($slug);

            return parent::view(['content', 'blog/view'], [
				'post' => $post
			]);
		} catch (\Exception $e) {
			return redirect('/');
		}
	}

	/**
	 * Handles URL: /blog/posts/submit
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler|Asatru\View\RedirectHandler
	 */
	public function view_submit($request)
	{
		try {
			$token = $request->params()->query('token', null);

			if ($token !== env('APP_ADMIN_ACCESS_TOKEN')) {
				throw new \Exception('Access denied');
			}

			return parent::view(['content', 'blog/submit'], [
				'token' => $token
			]);
		} catch (\Exception $e) {
			return redirect('/');
		}
	}

	/**
	 * Handles URL: /blog/posts/submit
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\RedirectHandler
	 */
	public function submit($request)
	{
		try {
			$token = $request->params()->query('token', null);
			$title = $request->params()->query('title', null);
			$content = $request->params()->query('content', null);

			if ($token !== env('APP_ADMIN_ACCESS_TOKEN')) {
				throw new \Exception('Access denied');
			}

			$post = Blog::submit($title, $content);

            return redirect('/blog/' . $post->get('slug'));
		} catch (\Exception $e) {
			return back();
		}
	}
}

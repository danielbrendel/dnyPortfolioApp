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
	 * Handles URL: /blog
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler|Asatru\View\RedirectHandler
	 */
	public function view_list($request)
	{
		try {
			if (!env('APP_ENABLE_BLOG')) {
				throw new \Exception('Blog feature currently inactive.');
			}

			$visitcount = Utils::getVisitorCount();

			return parent::view(['content', 'blog/list'], [
				'visitcount' => $visitcount,
				'_meta_title' => 'Blog',
				'_meta_description' => 'Daniel Brendel | Blog',
				'_meta_url' => url('/blog')
			]);
		} catch (\Exception $e) {
			return redirect('/');
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
			$limit = (int)$request->params()->query('limit', 0);
			$type = $request->params()->query('type', 'default');

			$blogposts = null;

			if ($type === 'default') {
				$blogposts = Blog::fetch($limit)?->asArray();
			} else if ($type === 'popular') {
				$blogposts = Utils::getPopularBlogPosts($limit);
			} else if ($type === 'random') {
				$blogposts = Blog::getRandomPosts($limit)?->asArray();
			} else {
				throw new \Exception('Unknown fetch type: ' . $type);
			}

            return json([
                'code' => 200,
                'data' => $blogposts
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
	public function view_post($request)
	{
		try {
			$slug = $request->arg('slug');

			$post = Blog::fromSlug($slug);
			if (!$post) {
				throw new \Exception('Post not found: ' . $slug);
			}

			$visitcount = Utils::getVisitorCount();
			$viewers = Utils::getViewerCount($slug);

            return parent::view(['content', 'blog/view'], [
				'post' => $post,
				'visitcount' => $visitcount,
				'viewers' => $viewers,
				'_meta_title' => $post->get('title') . ' | ' . env('APP_AUTHOR') . ' | Blog',
				'_meta_description' => Utils::descriptify($post->get('content')),
				'_meta_url' => url('/blog/' . $post->get('slug')),
				'_meta_image' => $post->get('metaimg')
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
	 * Handles URL: /blog/posts/submit/preview
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\RedirectHandler
	 */
    public function view_preview($request)
    {
		$token = $request->params()->query('token', null);

		if ($token !== env('APP_ADMIN_ACCESS_TOKEN')) {
			throw new \Exception('Access denied');
		}

        $title = $request->params()->query('title');
        $content = $request->params()->query('content');

        return parent::view(['content', 'blog/preview'], [
			'title' => $title,
			'content' => $content,
			'token' => $token
		]);
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
			$sharing = (bool)$request->params()->query('sharing', false);
			$tags = $request->params()->query('tags', '');
			
			if ($token !== env('APP_ADMIN_ACCESS_TOKEN')) {
				throw new \Exception('Access denied');
			}

			$post = Blog::submit($title, $content);

			if ($sharing) {
				if (env('MASTODON_API_ENABLE', false)) {
					Sharing::mastodon($title, url('/blog/' . $post->get('slug')), $tags);
				}

				if (env('BLUESKY_API_ENABLE', false)) {
					Sharing::bluesky($title, url('/blog/' . $post->get('slug')), $tags);
				}
			}

            return redirect('/blog/' . $post->get('slug'));
		} catch (\Exception $e) {
			return back();
		}
	}
}

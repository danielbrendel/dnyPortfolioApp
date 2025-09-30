<?php

/*
    Asatru PHP - Example controller

    Add here all your needed routes implementations related to 'index'.
*/

/**
 * Example index controller
 */
class IndexController extends BaseController {
	const INDEX_LAYOUT = 'layout';

	/**
	 * Perform base initialization
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct(self::INDEX_LAYOUT);
	}

	/**
	 * Handles URL: /
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
		$shouts = Shoutbox::pickMessages(10);
		$visitcount = Utils::getVisitorCount();

		return parent::view(['content', 'index'], [
			'shouts' => $shouts,
			'visitcount' => $visitcount
		]);
	}

	/**
	 * Handles URL: /projects
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function projects($request)
	{
		$projects = Projects::getAll();
		$visitcount = Utils::getVisitorCount();

		return parent::view(['content', 'projects'], [
			'projects' => $projects,
			'visitcount' => $visitcount
		]);
	}

	/**
	 * Handles URL: /sitemap
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\CustomHandler
	 */
	public function sitemap($request)
	{
		return custom('text/xml', Sitemap::get());
	}
}

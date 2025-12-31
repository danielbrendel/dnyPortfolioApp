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
		$projects = Projects::getAll();
		$shouts = Shoutbox::pickMessages(10);
		$visitcount = Utils::getVisitorCount();
		$backgrounds = Utils::getBackgroundImageList();

		return parent::view(['content', 'index'], [
			'projects' => $projects,
			'shouts' => $shouts,
			'visitcount' => $visitcount,
			'backgrounds' => $backgrounds,
			'widget' => 'about'
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

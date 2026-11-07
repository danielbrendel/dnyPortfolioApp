<?php

/**
 * Class IndexController
 * 
 * Handle index and meta operations
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

		$applets = null;

		if (env('APP_ENABLE_APPLETS')) {
			$applets = Applets::getList();
		}
		
		return parent::view(['content', 'index'], [
			'projects' => $projects,
			'shouts' => $shouts,
			'visitcount' => $visitcount,
			'backgrounds' => $backgrounds,
			'applets' => $applets,
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

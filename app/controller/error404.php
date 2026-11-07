<?php

/**
 * Class Error404Controller
 * 
 * Handle error 404
 */
class Error404Controller extends BaseController {
	/**
	 * Handles special case: $404
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
		return parent::view(['content', 'error/404']);
	}
}
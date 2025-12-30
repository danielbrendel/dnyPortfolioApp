<?php

/*
    Asatru PHP - Projects Controller
*/

class ProjectsController extends BaseController {
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
	 * Handles URL: /projects/view/{slug}
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function view_project($request)
	{
		$slug = $request->arg('slug');

        $project = Projects::fromSlug($slug);
        if (!$project) {
            throw new \Exception('Project not found: ' . $slug);
        }

		$visitcount = Utils::getVisitorCount();

		return parent::view(['content', 'projects/view'], [
			'project' => $project,
			'visitcount' => $visitcount
		]);
	}
}

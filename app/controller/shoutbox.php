<?php

/*
    Asatru PHP - Shoutbox Controller
*/

class ShoutboxController extends BaseController {
    /**
	 * Handles URL: /shoutbox/query
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function query($request)
	{
		try {
            $shout = Shoutbox::queryMessage()?->asArray();

            return json([
                'code' => 200,
                'shout' => $shout
            ]);
        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'msg' => $e->getMessage()
            ]);
        }
	}

}

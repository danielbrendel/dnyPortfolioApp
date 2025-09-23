<?php 

/**
 * Base controller class
 * 
 * Extend or modify to fit your project needs
 */
class BaseController extends Asatru\Controller\Controller {
	/**
	 * @var string
	 */
	protected $layout = 'layout';

	/**
	 * Perform base initialization
	 * 
	 * @param $layout
	 * @return void
	 */
	public function __construct($layout = '')
	{
		if ($layout !== '') {
			$this->layout = $layout;
		}

		try {
			Counter::addCount();
		} catch (\Exception $e) {
			addLog(ASATRU_LOG_WARNING, $e->getMessage());
		}
	}

	/**
	 * A more convenient view helper
	 * 
	 * @param array $yields
	 * @param array $attr
	 * @return Asatru\View\ViewHandler
	 */
	public function view($yields, $attr = array())
	{
		return view($this->layout, $yields, $attr);
	}

	/**
	 * Immediate response helper
	 * 
	 * @param $content
	 * @param $http_code
	 * @param $restype
	 * @return never
	 */
	public function respond(mixed $content, int $http_code = 200, string $restype = ''): never
	{
		if (strlen($restype) > 0) {
			header('Content-Type: ' . $restype);
		}

		http_response_code($http_code);

		exit($content);
	}
}
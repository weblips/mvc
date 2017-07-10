<?php
/**
 * Description of PageController
 *
 * @author uasynzheryanua
 */
class PagesController extends Controller {

	public function index() {
		$this->data['test_content'] = "Here will be a pages list";
	}

	public function view() {
		$params = App::getRouter()->getParams();

		if (isset($params[0])) {
			$alias                 = strtolower($params[0]);
			$this->data['content'] = "here will be a page with {$alias}";
		}
	}
}

<?php

/**
 * Description of PageController
 *
 * @author uasynzheryanua
 */
class PagesController extends Controller {

	public function __construct($data = array()) {
		parent::__construct($data);
		$this->model = new Page();
	}

	public function index() {
		$this->data['pages'] = $this->model->getList();
	}

	public function view() {
		$params = App::getRouter()->getParams();

		if (isset($params[0])) {
			$alias              = strtolower($params[0]);
			$this->data['page'] = $this->model->getByAlias($alias);
		}
	}

	public function admin_index() {
		$this->data['pages'] = $this->model->getList();
	}

	public function admin_edit() {
		if ($_POST && !empty($_POST)) {
			$id = isset($_POST['id'])?XSS($_POST['id']):null;
			if ($this->model->save($_POST, $id)) {
				Session::setFlash(__('page.add.succsses', 'page.add.succsses'));
			} else {
				Session::setFlash(__('page.page.wrong', 'Ошибка'));
			}
			Router::redirect('/admin/pages/');
		}

		if (isset($this->params[0])) {
			$this->data['pages'] = $this->model->getById($this->params[0]);
		} else {
			Session::setFlash(__('admin.page.wrong', 'Wrong page id'));
			Router::redirect('/admin/pages/');
		}
	}

	public function admin_add() {
		if ($_POST && !empty($_POST)) {
			if ($this->model->save($_POST)) {
				Session::setFlash(__('page.add.succsses', 'page.add.succsses'));
			} else {
				Session::setFlash(__('page.page.wrong', 'Ошибка'));
			}
			Router::redirect('/admin/pages/');
		}
	}

	public function admin_delete() {
		if (isset($this->params[0])) {
			$result = $this->model->delete($this->params[0]);
		}
		if ($result) {
			Session::setFlash(__('page.del.succsses', 'page.del.succsses'));
		} else {
			Session::setFlash(__('page.page.wrong', 'Ошибка'));
		}
		Router::redirect('/admin/pages/');
	}

}

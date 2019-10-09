<?php
class Controller_Payroll extends Controller {

	public function view() {
		$data['title'] = 'Payroll View';
		$data['workers'] = $this->model->getData();

		if ($data['workers']) {
			$this->view->generate('form_payroll_view', $data);			
		} else {
			$data['title'] = 'Payroll Create';
			$this->view->generate('form_payroll_create', $data);
		}
	}

	public function edit() {
		$data['title'] = 'Payroll Edit';
		$data['workers'] = $this->model->getData();

		include 'departments.php';
		$data['department'] = $defaultDepartment;

		if ($data['workers']) {
			$this->view->generate('form_payroll_edit', $data);			
		} else {
			$data['title'] = 'Payroll Create';
			$this->view->generate('form_payroll_create', $data);
		}
	}

	public function create() {
		$data['workers'] = $this->model->getData();

		if (!$data['workers']) {
			include 'workers.php';
			$this->model->setData($defaultWorker);
		}

		Router::redirect('edit');
	}

	public function remove() {
		$data['workers'] = $this->model->getData();

		if ($data['workers']) {
			$this->model->removeData();
		}

		Router::redirect();
	}

	public function save() {
		if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
			include 'workers.php';
			$this->model->saveData($_POST, $defaultWorker);
		}

		Router::redirect();
	}

}
<?php


class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

	}

	public function byyear() {
		
		$data = $this->model->listYears();
		($data) ? $this->view('listing/years', $data) : $this->view('error/index');
	}
	
	public function byname() {
		
		$data = $this->model->getGetData();
		unset($data['url']);
		
		if(!(isset($data["page"]))){
			$data["page"] = 1;
		}
		
		$result = $this->model->listNames($data);
		
		if($data["page"] == 1)
			($result) ? $this->view('listing/names', $result) : $this->view('error/index');
			
		else
			echo json_encode($result);
	}

	public function awardees($year_awarded = '') {

		$data = $this->model->listAwardeesInYear($year_awarded);
		($data) ? $this->view('listing/awardeesinyear', $data) : $this->view('error/index');
	}
}

?>

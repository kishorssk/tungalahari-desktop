<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

	}

	public function insertDetails(){

		$this->model->db->createDB(DB_NAME, DB_SCHEMA);
		$dbh = $this->model->db->connect(DB_NAME);

		$this->model->db->dropTable(METADATA_TABLE_L1, $dbh);
		$this->model->db->createTable(METADATA_TABLE_L1, $dbh, METADATA_TABLE_L1_SCHEMA);

		
		$awardees = $this->model->getAwardeesFromXML();

		if($awardees) {

			$this->model->insertAwardees($awardees, $dbh);
		}
		else{

			echo 'No awardee to insert';
		}

		$dbh = null;
	}
}

?>

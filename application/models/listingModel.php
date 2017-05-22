<?php


class listingModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function listNames($pagedata) {
		
		$perPage = 12;
		
		$page = $pagedata["page"];
		
		if($page == 1) $perPage = 8;
		
		$start = ($page-1) * $perPage;
		
		if($start < 0) $start = 0;
		
		$dbh = $this->db->connect(DB_NAME);
		
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L1 . ' ORDER BY name' . ' limit ' . $start . ',' . $perPage);
		
		$sth->execute();
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {
			
			array_push($data, $result);
		}
		
		$dbh = null;
		$data = array_filter($data);
		
		if(!empty($data))
			$data["hidden"] = '<input type="hidden" class="pagenum" value="' . $page . '" />';
		
		else
			$data["hidden"] = '<div class="lastpage"></div>';
		
		return $data;
	}
	public function listYears() {

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT DISTINCT year_awarded FROM ' . METADATA_TABLE_L1 . ' ORDER BY year_awarded');
		
		$sth->execute();
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}
		$dbh = null;
		return $data;
	}

	public function listAwardeesInYear($year_awarded = ''){

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE_L1 . ' WHERE year_awarded = ? ORDER BY name');
		
		$sth->execute(array($year_awarded));
		$data = array();
		
		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}
		$dbh = null;
		return $data;		
	}
}

?>

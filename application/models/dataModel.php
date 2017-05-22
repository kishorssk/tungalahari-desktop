<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function getAwardeesFromXML(){

		$fileName = XML_SRC_URL . 'awardees.xml';

		if (!(file_exists(PHY_XML_SRC_URL . 'awardees.xml'))) {
		
			return False;
		}

		$xml = simplexml_load_file($fileName);

		$awardees = array();
		foreach ($xml->person as $person) {

			$awardee['name'] = (string) $person->name;
			$awardee['sal'] = (string) $person->name['sal'];
			$awardee['rollno'] = (string) $person->rollno;
			$awardee['batch_details'] = (string) $person->batch_details;
			$awardee['year_awarded'] = (string) $person->year_awarded;
			$awardee['info'] = (string) $person->info;

			array_push($awardees, $awardee);
		}

		return $awardees;
	}

	public function listFiles($path, $type) {

		return glob($path . '*.' . $type);
	}

	public function insertAwardees($awardees, $dbh) {

		foreach ($awardees as $awardee) {
					
			$this->db->insertData(METADATA_TABLE_L1, $dbh, $awardee);
		}
	}

	public function insertPhotos($photos, $dbh) {

		foreach ($photos as $photo) {
			
			$data['id'] = preg_replace('/.*\/(.*)\.json/', "$1", $photo);
			$data['albumID'] = preg_replace('/.*\/(.*)\/.*\.json/', "$1", $photo);
			$data['id'] = $data['albumID'] . "__" . $data['id'];
			$albumDescription = $this->getAlbumDetails($data['albumID']);
			$albumDescription = $albumDescription->description;
			$photoDescription = $this->getJsonFromFile($photo);
			
			$data['description'] = json_encode(array_merge(json_decode($photoDescription, true), json_decode($albumDescription, true)));

			$this->db->insertData(METADATA_TABLE_L2, $dbh, $data);
		}
	}

	public function getJsonFromFile($path) {

		return file_get_contents($path);
	}
}

?>

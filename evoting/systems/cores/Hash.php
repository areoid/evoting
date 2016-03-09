<?php
// class Hash

class Hash {
	private $resulthashcode,
			  $name,
			  $date,
			  $strfinger,
			  $result = false;

	private $combine = array(
				'0' => 'iui',
				'1' => 'uiu',
				'2' => 'iuu',
				'3' => 'iu1',
				'4' => 'iii',
				'5' => 'i1i',
				'6' => '1u1',
				'7' => 'u1u',
				'8' => 'u11',
				'9' => '1ui',
				'A' => '111',
				'B' => '1i1',
				'C' => 'i11',
				'D' => 'ui1',
				'E' => '1uu',
				'F' => 'u1i'
			);

	public function createHash($name, $date, $strfinger) {
		$this->name = $name;
		$this->date = $date;
		$this->strfinger = $strfinger;
		return $this->hashing();
	}

	/*
	*	Start of hashing proccess
	*	@vars : name, date, strfingger
	*/
	private function hashing() {
		$data = md5($this->name.$this->date);
		$data = md5($data);
		$data = strrev($data);
		//$data = md5($data);
		$data = strtoupper($data);
		//$data = strrev($data);

		$datatemp = NULL;
		for($i=0; $i<=strlen($data); $i++) {
			$arr = substr($data, $i, 1);
			if($i == '4' || $i == '8' || $i == '12' || $i == '16' || $i == '20' || $i == '24' || $i == '28' || $i == '32') {
				$datatemp .= substr($this->strfinger, ($i/4)-1, 1);	
			}
			$datatemp .= "/%".$this->combine[$arr];
		}

		$this->resulthashcode = substr($datatemp, 1, strlen($datatemp)-6);
		$this->result = true;
	}

	/*
	*	Show results of hash code
	*/
	public function results() {
		return $this->resulthashcode;
	}

	/*
	*	Check proccess hashing, is success or not ?
	*/
	public function check() {
		return $this->result;
	}

}

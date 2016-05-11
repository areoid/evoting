<?php
// class Pin

class Pin {
	private $pin, $result = false, $cryptpin;
	private $crypt = array(
			'1'	=> '1u',
			'2'	=> 'uu',
			'3'	=> '1o',
			'4'	=> 'u1',
			'5'	=> '11',
			'6'	=> 'ou',
			'7'	=> 'o1',
			'8'	=> 'uo',
			'9'	=> 'oo',
			'0'	=> 'u0'
		);

	/*
	*	Method for encrypting PIN
	*/
	public function createCryptPin($pin) {
		$this->pin = $pin;
		$datatemp = NULL;

		for($i=0; $i<strlen($this->pin); $i++) {
			$arr = substr($this->pin, $i, 1);
			$datatemp .= $this->crypt[$arr];
		}

		$this->result = true;
		$this->cryptpin = $datatemp;
	}

	/*
	*	Show result of encrytion proccess
	*/
	public function results() {
		return $this->cryptpin;
	}

	/*
	*	Check proccess of encryption, is success or not?
	*/
	public function check() {
		return $this->result;
	}

}
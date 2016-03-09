<?php
/*
* HomeController.php
* Controller ini sebagai default halaman registration
*/

class HomeController extends Controller {
	private $id, $auth_voter = false;
	public function __construct() {
		parent::check_auth();
		if(Session::show('level') == "Crew" OR Session::show('level') == "Administrator") {
			return true;
		}
		else {
			Redirect::to('home/index');
		}
	}

	public function index() {
		$title = "Registration";
		$content = View::run(false, 'registration/reg_content');
		View::run(true, 'registration/index', array('title' => $title, 'content' => $content));
	}

	public function scanqr() {
		$qr = mysql_real_escape_string($_POST['qr']);

		// check QR Code, is listed or not
		$scan = DB::getInstance()->get('evo_voters', array('hash_qr', '=', $qr));

		if($scan->count()) {
			//is listed, checking again, is QR Code are registered or not yet 
			foreach ($scan->results() as $res) {
				if($res->is_reg == "true") {
					echo "QR Code already registered";
					exit();
				}
				else {

					echo "Registration Ready";
					exit();
			
				}
			}
		}
		else {
			echo "QR Code invalid";
			exit();
		}
	}

	// check combination qr and pin
	private function auth_qr_pin($dataqr, $pin) {
		$checkqr = DB::getInstance()->get('evo_voters', array('hash_qr', '=', $dataqr));
		if($checkqr->count()) {
			foreach ($checkqr->results() as $res) {
				$this->id = $res->id_voter;
			}
		}

		/*
		*	Trying to check the input PIN 
		*/
		$pinuji = new Pin;
		$pinuji->createCryptPin($pin);

		/*
		*	Put the pin by the qr
		*/
		$dataqr = '/'.$dataqr;
		$pindata = "";
		for($i=0; $i<=strlen($dataqr); $i+=19) {
			if($i != 0) {
				$pindata .= substr($dataqr, $i-1, 1);
			}
			$i+=2;
		}

		/*
		*	Check that combination
		*/
		if($pinuji->results() == $pindata) {
			$this->auth_voter = true;	
		}
		else {
			$this->auth_voter = false;	
		}

		return $this->auth_voter;
	}

	/*
	*	Registration here
	*/
	public function register() {
		$qr = mysql_real_escape_string($_POST['qr']);
		$pin = mysql_real_escape_string($_POST['pin']);
		/*
		echo "data qr : ".$qr;
		echo "\npin : ".$pin;
		*/

		$this->auth_qr_pin($qr, $pin);

		
		if($this->auth_voter) {
			$register = DB::getInstance()->update('evo_voters', 'id_voter', $this->id, array(
				'is_reg' => 'true'
			));
			if($register) {
				echo "Registration Successfull...";
			}
		}
		else {
			echo "QR Code and PIN does not match!";
		}
	
	
	}

	/*
	* method for test
	*/

	public function logout() {
		Session::delete();
	}

	
}
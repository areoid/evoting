<?php
/*
* HomeController.php
* Controller ini sebagai default halaman vote
*/

class HomeController extends Controller {
	private $id_voter, $auth_voter = false;

	public function index() {
		$lscan = DB::getInstance()->get('evo_candidates', array());
		$content = View::run(false, 'vote/vote_content', array('lscan' => $lscan));
		$title = 'Voting Page';
		View::run(true, 'vote/index', array('title' => $title, 'content' => $content));
	}

	public function choose() {
		$value = mysql_real_escape_string($_POST['val']);
		$votecan = DB::getInstance()->get('evo_candidates', array('id_candidate', '=', $value));
		$content = View::run(false, 'vote/auth_vote', array('votecan' => $votecan));
		View::run(true, 'vote/index', array('content' => $content));

	}

	public function scanqr() {
		$qr = mysql_real_escape_string($_POST['qr']);

		// check QR Code, is listed or not
		$scan = DB::getInstance()->get('evo_voters', array('hash_qr', '=', $qr));

		if($scan->count()) {
			//is listed, checking again, is QR Code are registered or not yet 
			foreach ($scan->results() as $res) {
				if($res->is_reg == "true") {
					if($res->is_vote == "true") {
						echo "QR Code already used";
						exit();
					}
					else {
						echo "Vote Ready";
						exit();
					}
				}
				else {
					echo "You are not registered";
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
				$this->id_voter = $res->id_voter;
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
	*	Result registration here
	*/
	public function result() {
		$qr = mysql_real_escape_string($_POST['qr']);
		$pin = mysql_real_escape_string($_POST['pin']);
		$id = mysql_real_escape_string($_POST['id']);
		/*
		echo "data qr : ".$qr;
		echo "\npin : ".$pin;
		echo "\nid :".$id;		

		*/

		$this->auth_qr_pin($qr, $pin);
		
		if($this->auth_voter) {
			$register = DB::getInstance()->update('evo_voters', 'id_voter', $this->id_voter, array(
				'is_vote' => 'true'
			));
			if($register) {
				$vote = DB::getInstance()->insert('evo_results', array(
					'id_results'	=> '',
					'id_candidate'	=> $id
				));

				if($vote) {
					echo "Voting Successfull...";
				}
			}
		}
		else {
			echo "QR Code and PIN does not match!";
		}
		
	}

}
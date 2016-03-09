<?php
/*
* HomeController.php
* class ini yang akan dijadikan sebagai halaman default
*/

class HomeController extends Controller {
	public function index() {
		$title = 'Homepage EVO CMS';
		View::run(true, 'index', array('title' => $title));
	}

	public function statistic() {
		$countcandidate = DB::getInstance()->get('evo_candidates', array());
		$title = 'Statistic';
		View::run(true, 'statistic', array('title' => $title, 'candidate' => $countcandidate));
	}

	public function rescount() {
		
		$countcandidate = DB::getInstance()->get('evo_candidates', array());
		// getting id of candidate
		foreach ($countcandidate->results() as $res) {
			$id[] 	= $res->id_candidate;
			$name[] = $res->name;
		}

		// count all of result by vote
		for($i=0; $i<count($id); $i++) {
			$rescount = DB::getInstance()->query("SELECT COUNT(*) AS counts FROM evo_results
													WHERE id_candidate = '". $id[$i] ."'
												");
			foreach ($rescount->results() as $res) {
				$counts = $res->counts;
			}
			$x = $i+1;
			$data[] = array(
					'label'	=> $name[$i],
					'y' 	=> $counts 
				);
		} 
			
		// parse to json encode
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function resvotes() {
		$totalvoters = DB::getInstance()->query("SELECT count(*) AS t_voters FROM evo_voters");
		foreach ($totalvoters->results() as $res) {
			$t_voters = $res->t_voters;
		}

		$regvoters = DB::getInstance()->query("SELECT count(*) AS r_voters FROM evo_voters
												WHERE is_reg = 'true'
											  ");
		foreach ($regvoters->results() as $res) {
			$r_voters = $res->r_voters;
		}

		$votes = DB::getInstance()->query("SELECT count(*) AS votes FROM evo_voters
												WHERE is_vote = 'true'
											  ");
	
		foreach ($votes->results() as $res) {
			$votes = $res->votes;
		}

		$data[] = array(
				't_voters'	=> $t_voters,
				'r_voters'	=> $r_voters,
				'votes'	=> $votes
			);
		// parse to json encode
		header('Content-Type: application/json');
		echo json_encode($data);

	}

	public function about() {
		$allcan = DB::getInstance()->query("SELECT * FROM evo_candidates");
		View::run(true, 'aboutcandidates', array('aboutcan' => $allcan));
	}

	public function view($param) {
		$id = mysql_real_escape_string($param);

		$candidate = DB::getInstance()->get('evo_candidates', array('id_candidate', '=', $id));

		if($candidate) {
			foreach ($candidate->results() as $res) {
				$id 		= $res->id_candidate; 
				$name 		= $res->name;
				$address 	= $res->address;
				$place 		= $res->place;
				$birth_day 	= $res->birth_day;
				$path_foto	= $res->path_foto;
				$achievement= $res->achievement;
				$biografi	= $res->biografi;
				$partai		= $res->partai;
			}
		}

		/*
		*	Parsing into json format
		*/
		header('Content-Type: application/json');
		echo json_encode(array(
			'id'		=> $id,
			'name' 		=> $name,
			'address'	=> $address,
			'place'		=> $place,
			'birth_day'	=> $birth_day,
			'path_foto'	=> $path_foto,
			'achievement'=> $achievement,
			'biografi'	=> $biografi,
			'partai'	=> $partai
		));
	}

}

<?php
/*
*	CandidateController.php
*/

class CandidatesController extends Controller {

	public function __construct() {
		parent::check_auth();
		if(Session::show('level') == "Administrator") {
			return true;
		}
		else {
			if(Session::show('level') == "Crew") {
				Redirect::to('registration/home/index');	
			} 
			else {
				Redirect::to('home/index');
			}
		}
	}

	public function menu(){
		return View::run(false, 'admin/menu');
	}

  	public function all() {
		$title = 'All Candidates';
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $this->content(false)));
	}

	public function content($val) {
		$allcan = DB::getInstance()->get('evo_candidates', array());

		if($val == true) {
			return View::run(true, 'admin/allcandidates', array('allcan' => $allcan));
		}
		else {
			return View::run(false, 'admin/allcandidates', array('allcan' => $allcan));
		}
	}

	public function add() {
		$title = 'Add Candidates';
		$content = View::run(false, 'admin/addcandidates');
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $content));
	}

    /*
    * Method untuk melakukan upload gambar
    */
	public function upload() {
		include "apps/libs/PHP_image_resize-master/smart_resize_image.function.php";
		$upload_dir = 'assets/admin/imagescandidates';

		foreach ($_FILES['uploadedFile']['name'] as $key => $value)
		{
		  if ($_FILES['uploadedFile']['error'][$key] == UPLOAD_ERR_OK) {
		    $result = move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], $upload_dir . '/' . $_FILES['uploadedFile']['name'][$key]);
		    // do what ever you need!

		    if($result) {
		    	$file = $upload_dir . '/' . $_FILES['uploadedFile']['name'][$key];

		    	$newName = 'resized' . $_FILES['uploadedFile']['name'][$key];

		    	$resizedFile = $upload_dir . '/' . $newName;

				list($width, $height) = getimagesize($file); 

				$resizedWidth = 300;

				$width_persen = ($resizedWidth / $width) * 100;

				$resizedHeight = ($width_persen / 100) * $height;

				/*
				define('SET_YOUR_WIDTH', $resizedWidth);
				define('SET_YOUR_HIGHT', round($resizedHeight));
				*/

				define('SET_YOUR_WIDTH', $resizedWidth);
				define('SET_YOUR_HIGHT', 400);

				smart_resize_image($file , null, SET_YOUR_WIDTH , SET_YOUR_HIGHT , false , $resizedFile , true, false ,100 );
				
				echo $newName;
		    }

		  }
		}

	}

	/*
	*	Method untuk men-submit form add candidate
	*/
	public function submit_candidates() {
		$name = mysql_real_escape_string($_POST['name']);
		$address = mysql_real_escape_string($_POST['address']);
		$place = mysql_real_escape_string($_POST['place']);
		$date = mysql_real_escape_string($_POST['date']);
		$pathpic = mysql_real_escape_string($_POST['pathpic']);
		$prestation = mysql_real_escape_string($_POST['prestation']);
		$biografi = mysql_real_escape_string($_POST['biografi']);
		$partai = mysql_real_escape_string($_POST['partai']);
		
		$candidate = DB::getInstance()->insert('evo_candidates', array(
			'id_candidate' 	=> '',
			'name' 			=> $name,
			'address'		=> $address,
			'place'			=> $place,
			'birth_day'		=> $date,
			'path_foto'		=> $pathpic,
			'achievement'	=> $prestation,
			'biografi'		=> $biografi,
			'partai'		=> $partai
		));

		/*
		*	Lakukan pengechekan hasil query
		*	Jika benar maka "true"
		*	Jika salah maka "false"
		*/
		if($candidate) {
			echo "true";
		}
		else {
			echo "false";
		}

	}

	/*
	*	Method untuk meng-query view
	*/
	public function view() {
		header('Content-Type: application/json');
		$id = mysql_real_escape_string($_POST['id']);

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

	/*
	*	Method for handling update proccess
	*/ 
	public function update_candidate(){
		$id 		= mysql_real_escape_string($_POST['id']);
		$name 		= mysql_real_escape_string($_POST['name']);
		$address	= mysql_real_escape_string($_POST['address']);
		$place		= mysql_real_escape_string($_POST['place']);
		$date		= mysql_real_escape_string($_POST['date']);
		$photo		= mysql_real_escape_string($_POST['photo']);
		$partai		= mysql_real_escape_string($_POST['partai']);
		$achievement= mysql_real_escape_string($_POST['achievement']);
		$biografi	= mysql_real_escape_string($_POST['biografi']);
		
		$candidate = DB::getInstance()->update('evo_candidates', 'id_candidate', $id, array(
						'name'		=> $name,
						'address'	=> $address,
						'place'		=> $place,
						'birth_day'	=> $date,
						'path_foto'	=> $photo,
						'achievement'=> $achievement,
						'biografi'	=> $biografi,
						'partai'	=> $partai
					));

		if($candidate) {
			echo "true";
		}
		else {
			echo "false";
		}

	}

	/*
	*	Method for handling delete proccess
	*/
	public function del(){
		$name = mysql_real_escape_string($_POST['name']);
		
		$candidate = DB::getInstance()->delete('evo_candidates', array('name', '=', $name));

		if($candidate) {
			echo "Delete OK!";
		}
		else {
			echo "Delete Failed!";
		}
	}

}
<?php

class VotesController extends Controller {

	protected $hashcode;

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

	/*
	*	Memuat halaman menu
	*/
	public function menu() {
		return View::run(false, 'admin/menu');
	}

	/*
	*	Method untuk menampilkan halaman add regional
	*/
	public function add_reg() {
		$title = "Add Regional";
		$content = View::run(false, 'admin/addregional');
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $content));
	}

	/*
	* 	Menampilkan halaman all regionals
	*/
	public function all_reg() {
		$title = "All Regionals";
		$allreg = DB::getInstance()->get('evo_regionals', array());
		$content = View::run(false, 'admin/allregionals', array('allreg' => $allreg));
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $content));
	}

	/*
	*	Method for showing a modal view on modal
	*/
	public function view_reg() {
		header('Content-Type: application/json');
		$id = mysql_real_escape_string($_POST['id']);

		$regional = DB::getInstance()->get('evo_regionals', array('id_regional', '=', $id));

		if($regional) {
			foreach ($regional->results() as $res) {
				$id 		= $res->id_regional;
				$regname 	= $res->regionalname;
				$description= $res->description;			}
		}

		echo json_encode(array(
			'id' 		=> $id,
			'regname'	=> $regname,
			'description' => $description 
		));

	}

	/*
	*	Method for update regionals
	*/
	public function update_reg() {
		$id 		= mysql_real_escape_string($_POST['id']);
		$regname 	= mysql_real_escape_string($_POST['regname']);
		$description= mysql_real_escape_string($_POST['description']);

		$regional = DB::getInstance()->update('evo_regionals', 'id_regional', $id, array(
						'regionalname'	=> $regname,
						'description'	=> $description
					));

		if ($regional) {
			echo "true";
		}
		else {
			echo "false";
		}
	}

	/*
	*	Method for handling delete regional
	*/
	public function delete_reg() {
		$id = mysql_real_escape_string($_POST['id']);

		$regional = DB::getInstance()->delete('evo_regionals', array('id_regional', '=', $id));

		if($regional) {
			echo "true";
		}
		else {
			echo "false";
		}
		
	}

	/*
	*	Menampilkan halaman add voter
	*/
	public function add_voter() {
		$title = "Add Voter";
		$content = View::run(false, 'admin/addvoter');
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $content));
	}

	/*
	*	Menampilkan halaman all voter
	*/
	public function all_voters() {
		$title = "All Voter";

		$allvoters = DB::getInstance()->query("SELECT 
												evo_voters.id_voter, 
												evo_voters.name, 
												evo_voters.address,
											    evo_voters.place,
											    evo_voters.birth_day,
											    evo_voters.religion,
											    evo_regionals.regionalname
											FROM evo_voters 
											JOIN evo_regionals 
											ON evo_regionals.id_regional = evo_voters.id_regional");
		
		$content = View::run(false,'admin/allvoters', array('allvoters' => $allvoters));
		View::run(true, 'admin/index', array('title' => $title, 'menu' => $this->menu(), 'content' => $content));
	}

	/*
	*	Method untuk proses submit regional
	*/
	public function submit_regional() {
		$regionalname = mysql_real_escape_string($_POST['regionalname']);
		$description = mysql_real_escape_string($_POST['description']);

		$votes = DB::getInstance()->insert('evo_regionals', array(
			'id_regional'	=> '',
			'regionalname'	=> $regionalname,
			'description'	=> $description
		));

		if($votes) {
			echo "true";
		}
		else {
			echo "false";
		}
	}

	/*
    * Method untuk melakukan upload gambar
    */
	public function upload() {
		require_once 'apps/libs/PHP_image_resize-master/smart_resize_image.function.php';
		$upload_dir = 'assets/admin/imagesvoters';

		foreach ($_FILES['uploadedFile']['name'] as $key => $value)
		{
		  if ($_FILES['uploadedFile']['error'][$key] == UPLOAD_ERR_OK) {
		    $result = move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], $upload_dir . '/' . $_FILES['uploadedFile']['name'][$key]);
		    // do what ever you need!

		    if($result) {
		    	$file = $upload_dir . '/' . $_FILES['uploadedFile']['name'][$key];

		    	$newName = 'voter-' . $_FILES['uploadedFile']['name'][$key];

		    	$resizedFile = $upload_dir . '/' . $newName;

				list($width, $height) = getimagesize($file); 

				$resizedWidth = 300;

				$width_persen = ($resizedWidth / $width) * 100;

				$resizedHeight = ($width_persen / 100) * $height;

				define('SET_YOUR_WIDTH', $resizedWidth);
				define('SET_YOUR_HIGHT', round($resizedHeight));

				smart_resize_image($file , null, SET_YOUR_WIDTH , SET_YOUR_HIGHT , false , $resizedFile , true, false ,100 );
				
				echo $newName;
		    }

		  }
		}

	}

	/*
	*	Method untuk proses submit voter
	*	This method will encryption a Pin and create hash code
	*/
	public function submit_voter() {
		$name 		= mysql_real_escape_string($_POST['name']);
		$address 	= mysql_real_escape_string($_POST['address']);
		$place 		= mysql_real_escape_string($_POST['place']);
		$date 		= mysql_real_escape_string($_POST['date']);
		$religion 	= mysql_real_escape_string($_POST['religion']);
		$regional 	= mysql_real_escape_string($_POST['regional']);
		$pin		= mysql_real_escape_string($_POST['pin']);
		$path_photo = mysql_real_escape_string($_POST['path_photo']); 

		$crypt = new Pin();
		$hash = new Hash();

		$crypt->createCryptPin($pin);
		if($crypt->check()) {
			$pin = $crypt->results();
			$hash->createHash($name, $date, $pin);

			if($hash->check()) {
				$hash_qr = $hash->results();
			}	
		}

		$voter = DB::getInstance()->insert('evo_voters', array(
			'id_voter'		=> '',
			'name'			=> $name,
			'address'		=> $address,
			'place'			=> $place,
			'birth_day'		=> $date,
			'religion'		=> $religion,
			'id_regional'	=> $regional,
			'path_photo'	=> $path_photo,
			'hash_qr'		=> $hash_qr,	
			'data_finger'	=> $pin

		));

		if($voter) {
			$this->createEvoCard($name, $hash_qr);
		}
		else {
			echo "false";
		}
		
	}

	/*
	*	test Method create card
	*/
	public function card($id) {
		View::run(true, 'admin/card', array('id' => $id));
	}

	/*
	*	Method for save the qrcard
	*/
	public function card_save() {
		define('SAVE', 'assets/admin/qrcard/');
		$name = "ampas";
		
		foreach ($_FILES['uploadedFile']['name'] as $key => $value) {
			if($_FILES['uploadedFile']['error'][$key] == UPLOAD_ERR_OK) {
				//$upload = move_uploaded_file(filename, destination)
				$upload = move_uploaded_file($_FILES['uploadedFile']['tmp_name'][$key], SAVE . '/' . $name . '.png');
				if($upload) {
					echo "true";
				}
				else {
					echo "false";
				}
			}
		}
	}

	public function card_rename() {
		define('RENAME', 'assets/admin/qrcard/');
		$nm = $_POST['nm'];
		$ren = rename(RENAME.'ampas.png', RENAME.$nm);
		if($ren) {
			echo "true rename";
		}
		else {
			echo "false rename";
		}
	}

	/*
	*	Method for creating Evo Card
	*/
	protected function createEvoCard($name, $hash) {
		require_once 'apps/libs/qrlib/qrlib.php';
		QRcode::png($hash, $name.'.png', 'M', 3);

		/*
		*	Move to evo card directory
		*/
		$move = rename($name.'.png', 'assets/admin/imagesqr/'.$name.'.png');
		if($move) {
			// get last ID
			$lastid = DB::getInstance()->query("SELECT MAX(id_voter) AS id FROM evo_voters");
			foreach ($lastid->results() as $res) {
				$_lastid = $res->id;
			}
			echo $_lastid;
		}
		else {
			echo "False moving QR";
		}
	}

	/*
	*	Method for handling view voter
	*/ 
	public function view_voter(){
		header('Content-Type: application/json');
		$id = mysql_real_escape_string($_POST['id']);

		$voter = DB::getInstance()->query("SELECT 
												evo_voters.id_voter, 
												evo_voters.name, 
												evo_voters.address,
											    evo_voters.place,
											    evo_voters.birth_day,
											    evo_voters.religion,
											    evo_voters.id_regional,
											    evo_voters.path_photo,
											    evo_regionals.regionalname
											FROM evo_voters 
											JOIN evo_regionals 
											ON evo_regionals.id_regional = evo_voters.id_regional
											WHERE evo_voters.id_voter = '". $id ."'");

		if($voter) {
			foreach ($voter->results() as $res) {
				$id 		= $res->id_voter;
				$name 		= $res->name;
				$address	= $res->address;
				$place		= $res->place;
				$date		= $res->birth_day;
				$religion	= $res->religion;
				$id_reg 	= $res->id_regional;
				$regname 	= $res->regionalname;
				$path_photo	= $res->path_photo;
			}	
		}

		echo json_encode(array(
			'id' 		=> $id,
			'name'		=> $name,
			'address' 	=> $address,
			'place'		=> $place,
			'date'		=> $date,
			'religion'	=> $religion,
			'id_reg'	=> $id_reg,
			'regname'	=> $regname,
			'path_foto'	=> $path_photo
		));
			
	}

	/*
	*	Method for fetching a list of regional	
	*/
	public function fetch_reg() {
		$fetch_reg = DB::getInstance()->get('evo_regionals', array());

		foreach ($fetch_reg->results() as $res) {
			echo '<option value="'. $res->id_regional .'">'. $res->regionalname .'</option>';
		}
	}

	public function update_voter() {
		$id 		= mysql_real_escape_string($_POST['id']);
		$name		= mysql_real_escape_string($_POST['name']);
		$address	= mysql_real_escape_string($_POST['address']);
		$place		= mysql_real_escape_string($_POST['place']);
		$date		= mysql_real_escape_string($_POST['date']);
		$religion	= mysql_real_escape_string($_POST['religion']);
		$regional 	= mysql_real_escape_string($_POST['regional']);
		$path_foto	= mysql_real_escape_string($_POST['path_foto']);

		$voter = DB::getInstance()->update('evo_voters', 'id_voter' , $id, array(
			'name'			=> $name,
			'address'		=> $address,
			'place'			=> $place,
			'birth_day'		=> $date,
			'religion'		=> $religion,
			'id_regional'	=> $regional,
			'path_photo'	=> $path_foto
		));

		if($voter) {
			echo "true";
		}
		else {
			echo "false";
		}

	}

	/*
	*	Method for handling delete voter
	*/
	public function delete_voter() {
		$id = mysql_real_escape_string($_POST['id']);
		$regional = DB::getInstance()->delete('evo_voters', array('id_voter', '=', $id));
		if($regional) {
			echo "true";
		}
		else {
			echo "false";
		}
	}

	public function card_name() {
		$set = DB::getInstance()->query("SELECT value FROM `evo_settings` where `key` = 'card_name' ");
		
		foreach ($set->results() as $res) {
			echo $res->value;
		}		

	}

	

}

// 1234567890zz1234567890zz1234567890zz1234567890zz1234567890zz1234567890zz
// %iu1/%1i1/%uiu/%1u1[1]/%1i1/%ui1/%1ui/%iuu[u]/%iii/%1i1/%ui1/%iii[u]/%u1u/%ui1/%1ui/%iu1[u]/%1i1/%u11/%iu1/%1ui[1]/%u11/%i11/%u1i/%1u1[o]/%1u1/%u1u/%ui1/%1i1[u]/%uiu/%u1i/%1i1/%i11[1]
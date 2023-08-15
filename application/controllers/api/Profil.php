<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Profil extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
			die();
		}
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/


    }

    function index_get(){

    	$id_auth = $this->get('id');
    	$cek = $this->db->get_where('tbl_profil', ['id_auth' => $id_auth])->row_array();

    	if ($cek == true) {
    		
    		$this->response($cek, 200);
    	}else{
    		$this->response(['message' => 'salah'], 404);
    	}
    }


    function index_post(){

    	$kode_user = 'user-'.rand(0,1000);

    	$data = [
    		'kode_user' => $kode_user,
    		'id_auth' => $this->post('id_auth'),
    		'nama' => $this->post('nama'),
    		'email' => $this->post('email'),
    		'alamat' => $this->post('alamat'),
    		'jk' => $this->post('jk'),
    		'tgl_lahir' => $this->post('tgl_lahir'),
    		'posisi' => $this->post('posisi'),
    		'nik' => $this->post('nik'),
    	];

    	$data2 = [
    		'kode_user' => $kode_user,
    		'id_auth' => $this->post('id_auth'),
    		'nama' => $this->post('nama'),
    		'email' => $this->post('email'),
    		'nik' => $this->post('nik'),
    	];
    	

    	$add = $this->db->insert('tbl_profil', $data);
    	$add_user = $this->db->insert('tbl_user', $data2);
    	$this->response($data, 201);
    }



}

?>
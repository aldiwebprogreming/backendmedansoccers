<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class AddMemberKarir extends REST_Controller
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

    	$iduser = $this->get('id_user');
    	$cek = $this->db->get_where('tbl_member_karir', ['id_user' => $iduser])->row_array();

    	if ($cek == true) {
    		
    		$this->response($cek, 200);
    	}else{

    		$this->response($cek, 404);
    	}

    }

    function index_post(){

    	
    	$data = [
    		'id_user' => $this->post('id'),
    		'nama' => $this->post('nama'),
    		'email' => $this->post('email'),
    		'waktu_member' => $this->post('waktu_member'),
    		'jml_bermain' => $this->post('waktu_member') * 12,
    		'total_harga' => $this->post('total_harga') * 1000,
    		'status_pembayaran' => $this->post('status_pembayaran'),
    		'tgl_mulai' => date('Y-m-d'),
    		'tgl_selesai' => '',
    		'pdf_url' => $this->post('pdf_url'),
    	];

    	$add = $this->db->insert('tbl_member_karir', $data);
    	if ($add) {

    		$this->response($data, 201);

    	}else{

    		$this->response(['message' => 'gagal'], 502);
    	}
    }




}

?>
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
    	$status = $this->get('status');

    	if ($status == 200) {

    		$this->db->order_by('id', 'desc');
    		$this->db->where('status_pembayaran', 200);
    		$this->db->where('id_user', $iduser);
    		$cek = $this->db->get('tbl_member_karir')->row_array();

    		if ($cek == true) {

    			$this->response($cek, 200);
    		}else{

    			$this->response($cek, 404);
    		}
    		
    	}else{

    		$this->db->order_by('id', 'desc');
    		$this->db->where('id_user', $iduser);
    		$cek = $this->db->get('tbl_member_karir')->row_array();

    		// $tglsekarang = date('Y-m-d');
    		// $tglselesai = new DateTime($cek['tgl_selesai']);
    		// $sisa = $tglselesai->diff($tglsekarang)->days + 1;

    		if ($cek == true) {

    			$this->response($cek, 200);
    		}else{

    			$this->response($cek, 404);
    		}
    	}
    	
    }

    function index_post(){

    	$waktu_member = $this->post('waktu_member');
		$tgl1    = date('Y-m-d'); // menentukan tanggal awal
		$tgl_selesai    = date('Y-m-d', strtotime('+'.$waktu_member. 'month', strtotime($tgl1))); // penjumlahan bulan sebanyak tentukan member

		$data = [
			'id_user' => $this->post('id'),
			'nama' => $this->post('nama'),
			'email' => $this->post('email'),
			'waktu_member' => $this->post('waktu_member'),
			'jml_bermain' => $this->post('waktu_member') * 12,
			'sisa_bermain' => $this->post('waktu_member') * 12,
			'total_harga' => $this->post('total_harga') * 1000,
			'status_pembayaran' => $this->post('status_pembayaran'),
			'tgl_mulai' => date('Y-m-d'),
			'tgl_selesai' => $tgl_selesai,
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
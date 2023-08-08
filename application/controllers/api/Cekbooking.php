<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Cekbooking extends REST_Controller
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

    function index_post(){

    	$jam = $this->post('jam');
    	$tgl = $this->post('tgl');
    	$idlapangan = $this->post('id_lapangan');

    	$this->db->where('jam_booking', $jam);
    	$this->db->where('tgl', $tgl);
    	$this->db->where('id_lapangan', $idlapangan);
    	$cek = $this->db->get('tbl_booking')->row_array();

    	if ($cek) {
    		
    		$this->response(['message' => 'tersedia', 'body' => true], 200);
    	}else{

    		$this->response(['message' => 'tidak tersedia', 'body' => false ], 200);

    	}
    	
    }

    

    
}

?>
<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Addbooking extends REST_Controller
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
    	$team = $this->post('team');
    	$idlapangan = $this->post('id_lapangan');

    	$lap = $this->db->get_where('tbl_lapangan', ['id' => $idlapangan])->row_array();

    	if ($jam == '10.00 - 12.00') {
    		$jam_mulai = '10';
    		$jam_selesai = '12';
    	}elseif($jam == '12.00 - 14.00'){
    		$jam_mulai = '12';
    		$jam_selesai = '14';
    	}elseif($jam == '14.00 - 16.00'){
    		$jam_mulai = '14';
    		$jam_selesai = '16';
    	}elseif($jam == '16.00 - 18.00'){
    		$jam_mulai = '16';
    		$jam_selesai = '18';
    	}elseif($jam == '18.00 - 20.00'){
    		$jam_mulai = '18';
    		$jam_selesai = '20';
    	}elseif($jam == '20.00 - 22.00'){
    		$jam_mulai = '20';
    		$jam_selesai = '22';
    	}elseif($jam == '22.00 - 24.00'){
    		$jam_mulai = '22';
    		$jam_selesai = '24';
    	};
    	
    	$data = [
    		'kode_booking' => 'bk-'.rand(0,1000),
    		'jam_booking' => $jam,
    		'jam_mulai' => $jam_mulai,
    		'jam_selesai' => $jam_selesai,
    		'tgl' => $tgl,
    		'team' => $team,
    		'lapangan' => $lap['lapangan'],
    		'id_lapangan' => $idlapangan,
    		'status' => 'menunggu'
    	];

    	$add = $this->db->insert('tbl_booking', $data);
    	if ($add) {
    		
    		$this->response($data, 201);

    	}else{

    		$this->response(['message' => 'gagal'], 502);
    	}
    }

    

    
}

?>
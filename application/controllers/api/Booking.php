<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Booking extends REST_Controller
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

    	date_default_timezone_set('Asia/Jakarta');
    	$jam = date('H');
    	// echo $jam;

    	$id = $this->get('id');
    	$date = date('Y-m-d');
    	$this->db->where('id_lapangan', $id);
    	$this->db->where('tgl', $date);
    	$booking = $this->db->get('tbl_booking')->result_array();

    	foreach ($booking as $data) {

    		if ($data['jam_mulai'] == $jam) {
    			$status = 'Mulai';
    		}elseif($data['jam_mulai'] > $jam){
    			$status = "Menunggu";
    		}elseif($data['jam_selesai'] <= $jam){
    			$status = 'Selesai';
    		}

    		// echo $data['jam_booking']. " - ". $status. "<br>";
    		$this->db->where('id', $data['id']);
    		$this->db->where('tgl', $date);
    		$this->db->update('tbl_booking', ['status' => $status]);
    	}

    	$id = $this->get('id');
    	$date = date('Y-m-d');
    	$this->db->where('id_lapangan', $id);
    	$this->db->where('tgl', $date);
    	$bk = $this->db->get('tbl_booking')->result();
    	$this->response($bk, 200);

    	
    }

    

    
}

?>
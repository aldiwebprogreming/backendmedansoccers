<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Pertandingan extends REST_Controller
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

    	$this->db->where('tgl_main', date('Y-m-d'));
    	$this->db->where('id_user', $iduser);
    	$cekmain = $this->db->get('tbl_main')->row_array();

    	$this->db->where('status', 1);
    	$this->db->where('team', $cekmain['team']);
    	$this->db->or_where('lawan', $cekmain['team']); 
    	$match = $this->db->get('tbl_lawan')->row_array();


    	if ($match) {
    		$this->response($match, 200);
    	}else{

    		$this->response(['message' => false], 404);
    	}



    }


}

?>
<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Score extends REST_Controller
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
    	ini_set('date.timezone', 'Asia/Jakarta');
    	$rand = rand(1, 100);
    	$tgl = 	date('Y-m-d');

    	$this->response(['rand' => "$rand", "tgl" => "$tgl", 'message' => 'true']);
    }


    



}

?>
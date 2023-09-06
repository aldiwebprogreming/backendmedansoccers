<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Listmain extends REST_Controller
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
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/ke


      }

      function index_get(){

        $id_user = $this->get('id_user');

        $this->db->where('id_user', $id_user);
        $main = $this->db->get('tbl_main')->result_array();

        $this->db->where('id_user', $id_user);
        $jml = $this->db->get('tbl_main')->num_rows();

        $this->response(['data' => $main, 'jml' => $jml],  200);

      }

      function index_post(){

      }




    }

  ?>
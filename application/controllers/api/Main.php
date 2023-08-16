<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Main extends REST_Controller
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


      }

      function index_post(){

       ini_set('date.timezone', 'Asia/Jakarta');

       $this->db->where('id_user', $this->post('id_user'));
       $this->db->where('tgl_main', date('Y-m-d'));
       $cek = $this->db->get('tbl_main')->row_array();

       if($cek == true){

        $this->response(['message' => 'data tersedia'], 200);
      }else{

        $data = [
          'id_user' => $this->post('id_user'),
          'nama' => $this->post('nama'),
          'email' => $this->post('email'),
          'tgl_main' => date('Y-m-d'),
          'jam_main' => date('H:i'),
          'status_main' => 0,
        ];

        $add = $this->db->insert('tbl_main', $data);
        if ($add) {
          $this->response(['message' => 'true'], 201);
        }else{
          $this->response(['message' =>'error'], 502);
        }
      }
    }


  }

?>
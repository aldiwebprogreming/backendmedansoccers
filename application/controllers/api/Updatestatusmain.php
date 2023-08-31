<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Updatestatusmain extends REST_Controller
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

       //  $id_user = $this->get('id_user');

       //  $this->db->where('id_user', $id_user);
       //  $this->db->where('tgl_main', date('Y-m-d'));

       //  $cekdata = $this->db->get('tbl_main')->row_array();
       //  if ($cekdata) {
       //    $this->response(['tersedia' => true, 'data' => $cekdata], 200);
       //  }else{
       //   $this->response(['tersedia' => false], 200);
       // }


      }

      function index_post(){
       ini_set('date.timezone', 'Asia/Jakarta');
       $date = date("Y-m-d");
       $id = $this->post('id_user');
       $main = $this->db->get_where('tbl_main', ['id_user' => $id])->result_array();
       foreach ($main as $dat) {

        $tgl1 = new DateTime($dat['tgl_main']);
        $tgl2 = new DateTime($date);
        $d = $tgl2->diff($tgl1)->days + 0;

        if($d >= 1){
          $status  = 0;
        }else{
         $status  = 1;
       }

       $id = $dat['id'];
       $this->db->where('id', $id);
       $update = $this->db->update('tbl_main', ['status_main' => $status]);
       $this->response($update);


     }

   }


 }

?>
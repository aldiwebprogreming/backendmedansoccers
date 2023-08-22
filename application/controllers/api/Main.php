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

        $id_user = $this->get('id_user');

        $this->db->where('id_user', $id_user);
        $this->db->where('tgl_main', date('Y-m-d'));

        $cekdata = $this->db->get('tbl_main')->row_array();
        if ($cekdata) {
          $this->response(['tersedia' => true, 'data' => $cekdata], 200);
        }else{
         $this->response(['tersedia' => false], 200);
       }


     }

     function index_post(){

       ini_set('date.timezone', 'Asia/Jakarta');

       $this->db->where('id_user', $this->post('id_user'));
       $this->db->where('tgl_main', date('Y-m-d'));
       $cek = $this->db->get('tbl_main')->row_array();

       if($cek == true){
         $cek = $this->db->get_where('tbl_member_karir', ['id_user' => $this->post('id_user')])->row_array();
         $sisa_bermain = $cek['sisa_bermain'];

         $this->response(['message' => 'data tersedia', 'sisa_bermain' => $sisa_bermain], 200);
       }else{

        $cek = $this->db->get_where('tbl_member_karir', ['id_user' => $this->post('id_user')])->row_array();
        $sisa_bermain = $cek['sisa_bermain'] - 1;

        $this->db->where('id_user', $this->post('id_user'));
        $this->db->update('tbl_member_karir', ['sisa_bermain' => $sisa_bermain]);


        $this->db->order_by('id', 'RANDOM');
        $team = $this->db->get('tbl_team')->row_array();

        $jamnow = date('H');
        if($jamnow < '08'){

          $jammain = '08.00';
          $jamselesai = '09.00';
          $sesi = 'sesi-1';
        }elseif($jamnow > '08'){


          $jammain = '09.00';
          $jamselesai = '10.00';
          $sesi = 'sesi-2';

        }

        $team = $team['team'];


        $data = [
          'id_user' => $this->post('id_user'),
          'nama' => $this->post('nama'),
          'email' => $this->post('email'),
          'tgl_main' => date('Y-m-d'),
          'jam_main' => $jammain,
          'jam_selesai' => $jamselesai,
          'sesi_main' => $sesi,
          'team' => $team,
          'team_lawan' => '',
          'status_main' => 0,
        ];

        $add = $this->db->insert('tbl_main', $data);
        if ($add) {
          $this->response(['message' => 'true', 'sisa_bermain' => $sisa_bermain], 201);
        }else{
          $this->response(['message' =>'error'], 502);
        }
      }
    }



    function acaklawan(){


    }


  }

?>
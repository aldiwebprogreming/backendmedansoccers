<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Lapangan extends REST_Controller
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

    	$slug = $this->get('slug');
        $id = $this->get('id');

        if ($slug) {

          $lap = $this->db->get_where('tbl_lapangan', ['slug' => $slug])->row_array();

      }elseif($id){
        $lap = $this->db->get_where('tbl_lapangan', ['id' => $id])->row_array();
    }else{

      $lap = $this->db->get('tbl_lapangan')->result();
  }

  $this->response($lap, 200);
}

    // function index_post(){

    // 	ini_set('date.timezone', 'Asia/Jakarta');
    // 	$nisn = $this->post('nisn');
    // 	$tgl = date('Y-m-d');

    // 	$siswa = $this->db->get_where('tbl_siswa', ['nisn' => $nisn])->row_array();

    // 	$this->db->where('nisn', $nisn);
    // 	$this->db->where('tgl_absensi', $tgl);
    // 	$cekabsen = $this->db->get('tbl_absensi')->row_array();

    // 	if ($cekabsen) {
    // 		$this->response(['message' => 'sudah absen', 'body' => 'ready']);
    // 	}else{

    // 		$data = [

    // 			'id_siswa' => $siswa['id'],
    // 			'nisn' => $nisn,
    // 			'nama_siswa' => $siswa['nama_siswa'],
    // 			'kelas' => $siswa['kelas'],
    // 			'jam_masuk' => date('H:i'),
    // 			'jam_keluar' => '',
    // 			'tgl_absensi' => date('Y-m-d'),
    // 		];

    // 		$create = $this->db->insert('tbl_absensi', $data);
    // 		if ($create) {
    // 			$this->response($data, 201);
    // 		}else{
    // 			$this->response(['message' => 'error'], 502);
    // 		}

    // 	}

    // }


}

?>
<?php 
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';


/**
 * 
 */
class Pay extends REST_Controller
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

        $params = array('server_key' => 'SB-Mid-server-HrwJZDLrpM_2MbRSj1bHTJXz', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');	
    }

    function index_post(){


    	// Required
    	$transaction_details = array(
    		'order_id' => rand(),
		  'gross_amount' => $this->post('total'), // no decimal allowed for creditcard
		);



		// Optional
    	$customer_details = array(
    		'first_name'    => "Andri",
    		'last_name'     => "Litani",
    		'email'         => "andri@litani.com",
    		'phone'         => "081122334455",

    	);

		// Data yang akan dikirim untuk request redirect_url.
    	$credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

    	$time = time();
    	$custom_expiry = array(
    		'start_time' => date("Y-m-d H:i:s O",$time),
    		'unit' => 'minute', 
    		'duration'  => 2
    	);

    	$transaction_data = array(
    		'transaction_details'=> $transaction_details,
    		'customer_details'   => $customer_details,
    		
    	);

    	error_log(json_encode($transaction_data));
    	$snapToken = $this->midtrans->getSnapToken($transaction_data);
    	error_log($snapToken);
    	// echo $snapToken;

    	$this->response(['message' => 'success', 'token' => $snapToken], 200);
    	
    }

    

    
}

?>
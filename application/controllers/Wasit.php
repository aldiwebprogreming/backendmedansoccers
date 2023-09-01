<?php 

	/**
	 * 
	 */
	class Wasit extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index(){

			$this->load->view('template_wasit/header');
			$this->load->view('wasit/index');
			$this->load->view('template/footer');
		}
	}
?>
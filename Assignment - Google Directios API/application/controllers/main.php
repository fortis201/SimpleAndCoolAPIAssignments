<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('/index/index');
	}

	function directions() {
		$html = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($this->input->post('origin'))."&destination=".urlencode($this->input->post('destination'))."&sensor=false");
		$data['dir'] = $this->output->set_content_type('application/json')->set_output($html);
	}
}

//end of main controller
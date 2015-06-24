<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('note');
	}

	public function index()
	{		
		$this->load->view('index');
	}

	function show() {
		$data['all_notes'] = $this->note->show();
		$this->load->view('/partials/notes_p', $data);
	}

	function update() {
		// var_dump($this->input->post());
		$this->note->update($this->input->post());
		$this->show();
		// redirect('/');
	}

	function create() {
		$this->note->create($this->input->post());
		$this->show();
	}

	function destroy() {
		$this->note->destroy($this->input->post());
		$this->show();
	}
}

//end of main controller
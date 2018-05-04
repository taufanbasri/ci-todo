<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function index()
  {
	  if ($this->session->userdata('logged_in')) {
	  	$user_id = $this->session->userdata('user_id');
		$data['lists'] = $this->list_model->user_lists($user_id);
		// $data['tasks'] = $this->task_model->user_tasks($user_id);
	  }

	  $data['main_content'] = 'home';

	  $this->load->view('layouts/main', $data);
  }

}

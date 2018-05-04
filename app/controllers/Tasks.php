<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller{

	public function show($id)
    {
    	$data['task'] = $this->task_model->show($id);
		$data['is_complete'] = $this->task_model->is_complete($id);

	  	$data['main_content'] = 'tasks/show';

	  	$this->load->view('layouts/main', $data);
    }
}

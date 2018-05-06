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

	public function add($list_id = null)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('body', 'Body', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$data['list'] = $this->task_model->get_list($list_id);
			$data['main_content'] = 'tasks/add';

			$this->load->view('layouts/main', $data);
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body'),
				'due_date' => $this->input->post('due_date'),
				'list_id' => $list_id
			];

			if ($this->task_model->store($data)) {
				$this->session->set_flashdata('task_created', 'Your task has been added');

				redirect('lists/show/' .$list_id);
			}
		}
	}
}

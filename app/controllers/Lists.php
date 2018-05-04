<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

	if (!$this->session->userdata('logged_in')) {
		$this->session->set_flashdata('noaccess', 'Sorry, you are not logged in');

		redirect('home');
	}
  }

  public function index()
  {
	  $user_id = $this->session->userdata('user_id');

	  $data['main_content'] = 'lists/index';
	  $data['lists'] = $this->list_model->get();

	  $this->load->view('layouts/main', $data);
  }

  public function create()
  {
  	$this->form_validation->set_rules('name', 'Name', 'trim|required');
	$this->form_validation->set_rules('body', 'Body', 'trim');

	if ($this->form_validation->run() == FALSE) {
		$data['main_content'] = 'lists/create';

		$this->load->view('layouts/main', $data);
	} else {
		$data = [
			'name' => $this->input->post('name'),
			'body' => $this->input->post('body'),
			'user_id' => $this->session->userdata('user_id')
		];

		if ($this->list_model->store($data)) {
			$this->session->set_flashdata('list_created', 'Your task list has been created');

			redirect('lists');
		}
	}
  }

  public function show($id)
  {
  	$data['list'] = $this->list_model->show($id);
	// $data['completed_task'] = $this->list_model->get_task($id, true);
	// $data['uncompleted_task'] = $this->list_model->get_task($id, false);

	$data['main_content'] = 'lists/show';

	$this->load->view('layouts/main', $data);
  }

  public function edit($id)
  {
	$this->form_validation->set_rules('name', 'Name', 'trim|required');
	$this->form_validation->set_rules('body', 'Body', 'trim');

	if ($this->form_validation->run() == FALSE) {
		$data['list'] = $this->list_model->edit($id);
		$data['main_content'] = 'lists/edit';

		$this->load->view('layouts/main', $data);
	} else {
		$data = [
			'name' => $this->input->post('name'),
			'body' => $this->input->post('body'),
			'user_id' => $this->session->userdata('user_id')
		];

		if ($this->list_model->update($id, $data)) {
			$this->session->set_flashdata('list_updated', 'Your task list has been updated');

			redirect('lists');
		}
	}
  }
}

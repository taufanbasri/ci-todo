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

	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('body', 'Body', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$data['task'] = $this->task_model->get_task($id);
			$data['list'] = $this->task_model->get_list($data['task']->list_id);

			$data['main_content'] = 'tasks/edit';

			$this->load->view('layouts/main', $data);
		} else {
			$data['task'] = $this->task_model->get_task($id);

			var_dump($data['task']->list_id);

			$data = [
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body'),
				'due_date' => $this->input->post('due_date'),
				'list_id' => $data['task']->list_id
			];

			if ($this->task_model->update($id, $data)) {
				$this->session->set_flashdata('task_updated', 'Your task has been updated');

				redirect('lists/show/' .$data['list_id']);
			}
		}
	}

	public function delete($list_id, $id)
	{
		$this->task_model->destroy($id);

		$this->session->set_flashdata('task_deleted', 'Your task has been deleted');

		redirect('lists/show/' .$list_id);
	}

	public function mark_complete($id)
	{
		if ($this->task_model->mark_complete($id)) {
			$task = $this->task_model->get_task($id);

			$this->session->set_flashdata('marked_complete', 'Task has been marked complete');

			redirect('lists/show/' .$task->list_id);
		}
	}

	public function mark_new($id)
	{
		if ($this->task_model->mark_new($id)) {
			$task = $this->task_model->get_task($id);

			$this->session->set_flashdata('marked_new', 'Task has been marked new');

			redirect('lists/show/' .$task->list_id);
		}
	}
}

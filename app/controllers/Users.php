<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	public function register()
	{
	  $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[50]');
	  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[50]');
	  $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|min_length[5]|max_length[100]');
	  $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|min_length[6]|max_length[20]');
	  $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
	  $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]|min_length[6]|max_length[20]');

	  if ($this->form_validation->run() == FALSE) {
		  $data['main_content'] = 'users/register';

		  $this->load->view('layouts/main', $data);
	  } else {
	  	if ($this->user_model->store()) {
	  		$this->session->set_flashdata('registered', 'You are now registered and can login.');

			redirect('home');
	  	}
	  }
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]');

		if ($this->form_validation->run() == FALSE) {
			// code...
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->user_model->login($username, $password);

			if ($user_id) {
				$user_data = [
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				];

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success', 'You are now logged in');

				redirect('home');
			} else {
				$this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');

				redirect('home');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();

		$this->session->set_flashdata('logged_out', 'You have been logged out');

		redirect('home');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function register()
  {
	  $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[50]|xss_clean');
	  $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[50]|xss_clean');
	  $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|min_length[5]|max_length[100]|xss_clean');
	  $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|min_length[6]|max_length[20]|xss_clean');
	  $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]|xss_clean');
	  $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]|min_length[6]|max_length[20]|xss_clean');

	  if ($this->form_validation->run() == FALSE) {
		  $data['main_content'] = 'users/register';

    	  $this->load->view('layouts/main', $data);
	  } else {
	  	// code...
	  }
  }

}

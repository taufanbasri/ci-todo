<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

	public function store()
	{
		$enc_password = md5($this->input->post('password'));

		$data = [
			'first_name'	=> $this->input->post('firstname'),
			'last_name' 	=> $this->input->post('lastname'),
			'email' 	=> $this->input->post('email'),
			'username' 	=> $this->input->post('username'),
			'password' 	=> $enc_password
		];

		$query = $this->db->insert('users', $data);

		return $query;
	}

	public function login($username, $password)
	{
		$enc_password = md5($password);

		$this->db->where('username', $username);
		$this->db->where('password', $enc_password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row(0)->id;
		} else {
			return false;
		}
	}
}

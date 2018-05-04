<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model{

  public function show($id)
  {
	$query = $this->db->get_where('tasks', ['id' => $id]);

	return $query->row();
  }

  public function is_complete($id)
  {
  	$query = $this->db->get_where('tasks', ['id' => $id]);

	return $query->row()->is_completed;
  }
}

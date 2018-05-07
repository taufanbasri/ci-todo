<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model{

  public function store($data)
  {
	$query = $this->db->insert('tasks', $data);

	return $query;
  }

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

  public function get_list($list_id)
  {
      $query = $this->db->get_where('lists', ['id' => $list_id]);

	  return $query->row();
  }

  public function get_task($id)
  {
  	$query = $this->db->get_where('tasks', ['id' => $id]);

	return $query->row();
  }

  public function update($id, $data)
  {
  	$this->db->where('id', $id);
	$this->db->update('tasks', $data);

	return TRUE;
  }

  public function destroy($id)
  {
  	$this->db->where('id', $id);
	$this->db->delete('tasks');

	return TRUE;
  }
}

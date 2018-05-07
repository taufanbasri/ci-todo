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

  public function mark_new($id)
  {
  	$this->db->set('is_completed', 0);
	$this->db->where('id', $id);
	$this->db->update('tasks');

	return TRUE;
  }

  public function mark_complete($id)
  {
  	$this->db->set('is_completed', 1);
	$this->db->where('id', $id);
	$this->db->update('tasks');

	return TRUE;
  }

  public function user_tasks($user_id)
  {
	$this->db->select('
		tasks.id as id,
		tasks.name as task_name,
		lists.name,
		tasks.created_at as created_at,
	');
  	$this->db->where('user_id', $user_id);
	$this->db->join('tasks', 'lists.id = tasks.list_id');
	$this->db->order_by('tasks.created_at', 'asc');

	$query = $this->db->get('lists');

	return $query->result();
  }
}

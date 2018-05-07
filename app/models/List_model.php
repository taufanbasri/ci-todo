<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_model extends CI_Model{

  public function get()
  {
    $query = $this->db->get('lists');

	return $query->result();
  }

  public function store($data)
  {
  	return $this->db->insert('lists', $data);
  }

  public function show($id)
  {
  	$query = $this->db->get_where('lists', ['id' => $id]);

	return $query->row();
  }

  public function edit($id)
  {
	$query = $this->db->get_where('lists', ['id' => $id]);

	return $query->row();
  }

  public function update($id, $data)
  {
  	$this->db->where('id', $id);
	$this->db->update('lists', $data);

	return TRUE;
  }

  public function destroy($id)
  {
  	$this->db->where('id', $id);
	$this->db->delete('lists');
	// $this->delete_tasks_of_list($id);
	return;
  }

  public function user_lists($user_id)
  {
  	$query = $this->db->order_by('created_at', 'desc')->get_where('lists', ['user_id' => $user_id]);

	return $query->result();
  }

  public function get_tasks($id, $is_completed = true)
  {
  	$this->db->select('
		tasks.name,
		tasks.body,
		tasks.id,
		lists.name as list_name,
		lists.body as list_body,
	');

	$this->db->from('tasks');
	$this->db->join('lists', 'lists.id = tasks.list_id');
	$this->db->where('tasks.list_id', $id);

	if ($is_completed == TRUE) {
		$this->db->where('tasks.is_completed', 0);
	} else {
		$this->db->where('tasks.is_completed', 1);
	}

	$query = $this->db->get();

	if ($query->num_rows() < 1) {
		return FALSE;
	}

	return $query->result();
  }
}

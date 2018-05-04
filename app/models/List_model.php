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
}

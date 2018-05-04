<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_model extends CI_Model{

  public function get()
  {
    $query = $this->db->get('lists');

	return $query->result();
  }

}

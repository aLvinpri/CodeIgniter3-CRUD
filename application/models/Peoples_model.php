<?php

class Peoples_model extends CI_Model
{

  public function getAll($table, $limit, $start, $keyword)
  {
    if ($keyword) {
      $this->db->like('name', $keyword);
      $this->db->or_like('email', $keyword);
    }
    return $this->db->get($table, $limit, $start)->result_array();
  }

  public function countAll($table)
  {
    return $this->db->get($table)->num_rows();
  }
}

<?php
Class Subject_model extends CI_Model
{
  public function get_subjects($subject)
  {
     return $this->db->get($subject, 'name')->result();
  }
}

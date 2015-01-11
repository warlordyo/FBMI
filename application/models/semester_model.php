<?php
Class Semester_model extends CI_Model
{
  public function get_subjects($semester)
  {
     return $this->db->get_where('subjects', array('semester' => $semester))->result();
  }
}

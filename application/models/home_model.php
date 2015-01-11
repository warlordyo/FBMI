<?php
Class Home_model extends CI_Model
{
 function get_semesters()
 {
     return $this->db->get('Semesters')->result();  
}
}
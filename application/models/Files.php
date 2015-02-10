<?php
Class Files extends CI_Model
{
    function getSubject($semester)
    {
        return $this->db->query("SELECT DISTINCT subject FROM Subjects WHERE semester = '$semester'")->result();
    }
    function getFile($args)
    {
        return $this->db->get_where('files', ['semester' => $args[0], 'subject' => $args[1] ])->result();
    }
    function getSemester()
    {
        return $this->db->query('SELECT DISTINCT semester FROM Subjects')->result();
    }
    function getFileById($id)
    {
        return $this->db->get_where('files', ['id' => $id])->result_array();
    }
    
}

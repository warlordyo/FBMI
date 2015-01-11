<?php
Class File extends CI_Model
{
 function add_file($file_name)
 {
     $data = array(
         'fileName' => $file_name,
     );
   $this->db->insert('files',$data);
  }
  function select_all($table_name)
  {
      return $row = $this->db->get('files');
  }
}

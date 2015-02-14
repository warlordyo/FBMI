<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-Type: text/html; charset=utf-8");
set_include_path(APPPATH);
session_start(); //we need to call PHP's session object to access it through CI
class Upload extends CI_Controller {
 
 function __construct()
 {
   
   parent::__construct();
   $this->load->model('files');
   $this->load->helper('download');
   
  
 }
 function index($method,$args = [])
 {     
    
   $data['semester'] = $this->files->getSemester();
   $this->load->view('files/semester_view',$data);
 }
 function upload_file($args)
    {
        if(isset($_POST['upload']))
        {
            $config['upload_path'] = APPPATH."upload";
            $config['allowed_types'] = "zip|rar|pdj|jpeg|png|pdf|doc|docx";
            $config['remove_spaces'] = true;
            $config['encrypt_name'] = true;
            
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            
            
            
            $upload_data = $this->upload->data();
            
            $fileArr['oldFileName']= $upload_data['orig_name'];
            $fileArr['newFileName'] = $upload_data['file_name'];
            $fileArr['semester'] = $args[0];
            $fileArr['subject'] = $args[1];
            
            echo $this->upload->display_errors(); 
            if($this->upload->display_errors() == Null)
            {
                $this->db->insert('Files',$fileArr);
                echo "FILE UPLOADED";
            }
        }
        else    
        {
           $data['params'] = $args;
           $this->load->view('files/upload_view',$data); 
        }
        
    }
    
    function _remap($method,$args)
    {
        if (method_exists($this,$method))
        {
            $this->$method($args);
        }
        else
        {
            $this->index($method,$args);
        }
    }
    function files($args)
    {
        
        if (isset($args[0]) && (!isset($args[1])) && (!isset($args[2])))
        {
           $data['subject'] = $this->files->getSubject($args[0]);
           $data['semester'] = $args[0];
           $this->load->view('files/subject_view',$data);
        }
        if (isset($args[1]) && (!isset($args[2])))
        {
           $data['file'] = $this->files->getFile($args);
           $data['semester'] = $args[0];
           $this->load->view('files/file_view',$data);
        }
        if(isset($args[2]))
        {
            if ($args[2] == 'upload')
            {
                $this->upload_file($args);
            }
            else
            {
                //$t = new Transliterate();
                $result = $this->files->getFilebyId($args[2]);
                $filename = $result[0]['newFileName'];
                $data =  file_get_contents(APPPATH."upload/".$filename);
                force_download($filename,$data);
            }
        }
       
        
    }
    
  }

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Upload extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function upload_file() 
    {
        
        if(isset($_POST['upload']))
        {
            $config['upload_path'] = "./upload";
            $config['allowed_types'] = "zip|rar|pdj|jpeg|png|pdf|doc|docx";
            
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            
            $upload_data = $this->upload->data();
            var_dump($filename = $upload_data['file_name']);
            $this->load->model('file');
            $this->file->add_file($filename);
            echo "FILE UPLOADED";
        }
        else 
        {
           $this->load->view('home_view'); 
        }
        
    }
 function open_sem($semester)
 {
     $this->load->model('semester_model');
     $data['subjects'] = $this->semester_model->get_subjects($semester);
     $this->load->view('semester_view',$data);
 }
 function open_subj($subj)
 {
     $this->load->model('subject_model');
     $data['files'] = $this->subject_model->get_subjects($subj);
     $this->load->view('subjects_view',$data);     
 }
 function show_files()
 {
     $this->load->model('home_model');
     $result['semesters'] = $this->home_model->get_semesters();
     $this->load->view('home_view',$result);
 }
}
 

<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class First extends CI_Controller {
    
    public function index()
    {
       $this->load->view('hello_view');
    } 
    
    function about($id, $page)
    {
        $data['name'] = "LOLIK";
        $data['surname'] = "LOLOV";
        $data['age'] = 6;
        $this->load->view('about_view', $data);
        if ($id = 1)
        {
            echo "Parametr";
        }
    }
    
    function articles()
    {
        $this->load->model('articles_model');
        $data['articles'] = $this->articles_model->get_articles();
        $this->load->view('articles_view', $data);
    }
    
    function add_article()
    {
        $data['title'] = "Pyataya";
        $data['text'] = "TEXT";
        $data['date'] = "2011-12-23";
        $this->articles_model->add_article($data);
    }
    
    function edit_article()
    {
        $data['title'] = 'new name 5';
        $data['text'] = 'new text';
        $data['date'] = '2012-12-12';
        $this->articles_model->edit_article($data);
    }
}

?>
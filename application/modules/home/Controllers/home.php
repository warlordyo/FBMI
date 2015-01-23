<?php

class Home extends MY_Controller{

	function index(){
		$data['main_content'] = 'index';
		//$data['menu'] = 'menu';
		//$this->load->module('menu/menu');
		//$this->menu->index();
		$this->load->view('page', $data);
	}
		
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
	}

	public function Home()
	{
		if ($this->session->userdata('email') != '')
        {
			$this->load->view('option/header');
			$this->load->view('home');
			$this->load->view('option/footer');
        }else{
            $this->load->view('login');
        }
		

	}



}

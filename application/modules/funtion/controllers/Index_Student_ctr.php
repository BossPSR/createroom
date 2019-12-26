<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Student_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
	}

	public function index_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$data['user'] = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
			if(empty($data['user'])){
				$this->load->view('login');
			}
			$data['rooms'] = $this->db->order_by('id', 'DESC')->get('tbl_rooms')->result_array();

			$this->load->view('option_student/header_student');
			$this->load->view('index_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
		
	}

	public function detail_room_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$data['room'] = $this->db->get_where('tbl_rooms',['id'=>$this->input->get('id')])->row();

			$this->load->view('option_student/header_student');
			$this->load->view('detail_room_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function student_my_room()
	{
		if ($this->session->userdata('email') != '')
        {
			

			$this->load->view('option_student/header_student');
			$this->load->view('student_my_room');
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function profile_student()
	{
		if ($this->session->userdata('email') != '')
        {
			

			$this->load->view('option_student/header_student');
			$this->load->view('profile_student');
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

}

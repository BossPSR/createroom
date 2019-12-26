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
			$data['user'] = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('option_student/header_student');
			$this->load->view('profile_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function edit_profile_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
            $data = array(
              'Frist_name'        => $this->input->post('first_name'),
              'last_name'         => $this->input->post('last_name'),
              'email'  => $this->input->post('email'),
			  'Public_code'  => $this->input->post('public_code'),
			  'codes'  => $this->input->post('codes')
            );
            $this->db->where('id',$student->id);
            $success = $this->db->update('tbl_student',$data);
    
            if($success > 0)
            {
              $this->session->set_flashdata('response','แก้ไขโปรไฟล์เรียบร้อยแล้ว');
            }else{
    
              $this->session->set_flashdata('msg','แก้ไขโปรไฟล์ไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
            }

			redirect('profile_student');
			
        }else{
            $this->load->view('login');
        }
	}

	public function edit_password_student()
    {
        if ($this->session->userdata('email') != '')
        {
            $password = $this->input->post('password');
            $newpassword = $this->input->post('newpassword');
            $confirmpassword = $this->input->post('confirmpassword');

            $student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
            $password = md5($password);
            if ($password != $student->password) {
                $this->session->set_flashdata('msg','รหัสผ่านเก่าของคุณไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง !!.');
                redirect('profile_student');
            }

            if ($newpassword != $confirmpassword) {
                $this->session->set_flashdata('msg','รหัสผ่านใหม่กับยืนยันรหัสผ่านใหม่ของคุณไม่ตรงกัน กรุณากรอกให้ตรงกัน !!.');
                redirect('profile_student');
            }

            $confirmpassword = md5($confirmpassword);

            $data = array(
              'password'        => $confirmpassword
            );
            $this->db->where('id',$student->id);
            $success = $this->db->update('tbl_student',$data);
    
            if($success > 0)
            {
              $this->session->set_flashdata('response','แก้ไขรหัสผ่านเรียบร้อยแล้ว');
            }else{
    
              $this->session->set_flashdata('msg','แก้ไขรหัสผ่านไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
            }

            redirect('profile_student');

        }else{
            $this->load->view('login');
        }
    }

}

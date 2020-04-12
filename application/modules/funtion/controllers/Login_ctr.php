<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('upload');
    }

    public function login()
    {
        if ($this->session->userdata('username') != '')
        {
            redirect('index');
        }else{
            $this->load->view('login');
        }
    }

    public function loginMe()
    {
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('password', 'Password','required');
        if ($this->form_validation->run())
        {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->load->model('Login_model');
            //ของอาจารย์
            if ($this->Login_model->login($username, $password))
            {
                $user_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($user_data);
                redirect('Login');
            }
            //ของนักเรียน
            elseif($this->Login_model->login_student($username, $password)){
                $user_data = array(
                    'email' => $username
                );
                $this->session->set_userdata($user_data);
                redirect('index_student');
            }
            else
            {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> กรุณากรอก Username หรือ Password ให้ถูกต้อง !!   <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>');
                redirect('Login','refresh');
            }
        }   
        else
        {
            $this->login();
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();//ล้างsession

        redirect('Login');//กลับไปหน้า Login
    }

    public function profile()
    {
        if ($this->session->userdata('username') != '')
        {
            $data['user'] = $this->db->get_where('tbl_teacher' ,['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('option/header');
            $this->load->view('profile',$data);
            $this->load->view('option/footer');

        }else{
            $this->load->view('login');
        }
    }

    public function edit_profile()
    {
        if ($this->session->userdata('username') != '')
        {
            $teacher = $this->db->get_where('tbl_teacher',['username' => $this->session->userdata('username')])->row();
            $data = array(
              'username'        => $this->input->post('username'),
              'title'         => $this->input->post('title'),
              'first_name'  => $this->input->post('first_name'),
              'last_name'  => $this->input->post('last_name'),
              'updated_at'  => date('Y-m-d H:i:s')
            );
            $this->db->where('id',$teacher->id);
            $success = $this->db->update('tbl_teacher',$data);

            if ($_FILES['file_name']['name']) {
				$path = 'uploads/profile/teacher/'.strtotime(date('Y-m-d H:i:s'));
				$config['upload_path'] = $path;
				$config['allowed_types'] = '*';
				$config['max_size']     = '200480';
				$config['max_width'] = '50000';
				$config['max_height'] = '50000';
			
				if(!is_dir($config['upload_path']))
				{
					mkdir($config['upload_path'],0777,true);
				}
				$this->upload->initialize($config);
				if ($this->upload->do_upload('file_name')) {
					$gamber = $this->upload->data();
					$this->db->where('id',$teacher->id);
					$this->db->update('tbl_teacher',['file_name' => $gamber['file_name'],'path' => $path]);
				}

			}
    
            if($success > 0)
            {
              $this->session->set_flashdata('response','แก้ไขโปรไฟล์เรียบร้อยแล้ว');
            }else{
    
              $this->session->set_flashdata('msg','แก้ไขโปรไฟล์ไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
            }

            redirect('profile');

        }else{
            $this->load->view('login');
        }
    }

    public function edit_password()
    {
        if ($this->session->userdata('username') != '')
        {
            $password = $this->input->post('password');
            $newpassword = $this->input->post('newpassword');
            $confirmpassword = $this->input->post('confirmpassword');

            $teacher = $this->db->get_where('tbl_teacher',['username' => $this->session->userdata('username')])->row();
            $password = md5($password);
            if ($password != $teacher->password) {
                $this->session->set_flashdata('msg','รหัสผ่านเก่าของคุณไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง !!.');
                redirect('profile');
            }

            if ($newpassword != $confirmpassword) {
                $this->session->set_flashdata('msg','รหัสผ่านใหม่กับยืนยันรหัสผ่านใหม่ของคุณไม่ตรงกัน กรุณากรอกให้ตรงกัน !!.');
                redirect('profile');
            }

            $confirmpassword = md5($confirmpassword);

            $data = array(
              'password'        => $confirmpassword,
              'updated_at'  => date('Y-m-d H:i:s')
            );
            $this->db->where('id',$teacher->id);
            $success = $this->db->update('tbl_teacher',$data);
    
            if($success > 0)
            {
              $this->session->set_flashdata('response','แก้ไขรหัสผ่านเรียบร้อยแล้ว');
            }else{
    
              $this->session->set_flashdata('msg','แก้ไขรหัสผ่านไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
            }

            redirect('profile');

        }else{
            $this->load->view('login');
        }
    }
}


?>
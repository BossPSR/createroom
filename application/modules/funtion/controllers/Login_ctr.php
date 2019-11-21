<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
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
            
            if ($this->Login_model->login($username, $password))
            {
                $user_data = array(
                    'username' => $username
                );
                $this->session->set_userdata($user_data);
                redirect('Category');
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
}


?>
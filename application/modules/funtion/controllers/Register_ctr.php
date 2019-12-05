<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->view('register_student');
    }

    function regist_complete()
    {
           
          $fname         = $this->input->post('Frist_name');
          $lname         = $this->input->post('last_name');
          $tel           = $this->input->post('tel');
          $email         = $this->input->post('email');
          $password      = $this->input->post('password');
          $cpassword     = $this->input->post('password');
          $Public_code      = $this->input->post('Public_code');
          $code_student      = $this->input->post('code_student');
        
          if ($password != $cpassword) 
          {
              $this->session->set_flashdata('msg','รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง!!');
              redirect('Register');   
          }
          else
          {
              $data = array
              (
                'Frist_name'    => $fname,
                'last_name'     => $lname,
                'tel'           => $tel,
                'email'         => $email,
                'Public_code'   => $Public_code,
                'codes'         => $code_student,
                'password'      => md5($password)
              );
              
  
              $succeed =  $this->db->insert('tbl_student',$data);
  
              if($succeed > 0)
              {
                $this->session->set_flashdata('response','บันทึกข้อมูลสมาชิกเรียบร้อยแล้ว/กรุณาเข้าสู่ระบบ!!');
              }
              else
              {
                $this->session->set_flashdata('msg','เกิดข้อผิดพลาดในการสมัคร กรุณาลองใหม่อีกครั้ง!!');
              }
              redirect('Login');
          }
           
      }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    public function index()
    {

        $this->load->view('register_student');
    }

    public function regist_complete()
    {
          $fname         = $this->input->post('Frist_name');
          $lname         = $this->input->post('last_name');
          $tel           = $this->input->post('tel');
          $email         = $this->input->post('email');
          $password      = $this->input->post('password');
          $cpassword     = $this->input->post('cpassword');
          $Public_code      = $this->input->post('Public_code');
          $code_student      = $this->input->post('code_student');

          
          $path = 'uploads/profile/student/'.strtotime(date('Y-m-d H:i:s'));
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

          //เช็ครหัสประชาชนว่าซ้ำกันมั้ย
          $publicCode = $this->db->get_where('tbl_student',['Public_code'=>$Public_code])->row_array();
          if (!empty($publicCode)) {
              $this->session->set_flashdata('msg','รหัสประชาชนนี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง!!');
              redirect('Register');   
          }

           //เช็ครหัสนักศึกษาว่าซ้ำกันมั้ย
           $codes = $this->db->get_where('tbl_student',['codes'=>$code_student])->row_array();
           if (!empty($codes)) {
               $this->session->set_flashdata('msg','รหัสนักศึกษานี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง!!');
               redirect('Register');   
           }

            //เช็คอีเมลว่าซ้ำกันมั้ย
            $emailCheck = $this->db->get_where('tbl_student',['email'=>$email])->row_array();
            if (!empty($emailCheck)) {
                $this->session->set_flashdata('msg','อีเมลนี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง!!');
                redirect('Register');   
            }
        
          if ($password != $cpassword) 
          {
              $this->session->set_flashdata('msg','รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง!!');
              redirect('Register');   
          }
          else
          {
            if ($_FILES['file_name']['name']) {
                if ($this->upload->do_upload('file_name')) {
                $gamber     = $this->upload->data();
                $data = array(
                  'Frist_name'    => $fname,
                  'last_name'     => $lname,
                  'tel'           => $tel,
                  'email'         => $email,
                  'Public_code'   => $Public_code,
                  'codes'         => $code_student,
                  'password'      => md5($cpassword),
                  'file_name'   => $gamber['file_name'],
                  'path'        => $path,
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

              }
            }
              
  
              
              redirect('Login');
          }
           
      }

      public  function register_teacher_complete()
    {
          $title           = $this->input->post('title'); 
          $fname         = $this->input->post('Frist_name');
          $lname         = $this->input->post('last_name');
          $email         = $this->input->post('email');
          $username      = $this->input->post('username');
          $password      = $this->input->post('password');
          $cpassword     = $this->input->post('cpassword');
          
         
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

          //เช็ครหัสผู้ใช้ว่าซ้ำกันมั้ย
          $checkUsername = $this->db->get_where('tbl_teacher',['username'=>$username])->row_array();
          if (!empty($checkUsername)) {
              $this->session->set_flashdata('msg','รหัสผู้ใช้นี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง!!');
              redirect('Register');   
          }

            //เช็คอีเมลว่าซ้ำกันมั้ย
            $emailCheck = $this->db->get_where('tbl_teacher',['email'=>$email])->row_array();
            if (!empty($emailCheck)) {
                $this->session->set_flashdata('msg','อีเมลนี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง!!');
                redirect('Register');   
            }
        
          if ($password != $cpassword) 
          {
              $this->session->set_flashdata('msg','รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง!!');
              redirect('Register');   
          }
          else
          {
            if ($_FILES['file_name']['name']) {
              if ($this->upload->do_upload('file_name')) {
                $gamber = $this->upload->data();
                $data = array(
                  'title'         => $title,
                  'first_name'    => $fname,
                  'last_name'     => $lname,
                  'username'      => $username,
                  'email'         => $email,
                  'password'      => md5($cpassword),
                  'file_name'   => $gamber['file_name'],
                  'path'        => $path,
                  'create_date'   => date('Y-m-d'),
                  'created_at'    => date('Y-m-d H:i:s'),
                  'updated_at'    => date('Y-m-d H:i:s'),
                );
                $succeed =  $this->db->insert('tbl_teacher',$data);
  
                if($succeed > 0)
                {
                  $this->session->set_flashdata('response','บันทึกข้อมูลสมาชิกเรียบร้อยแล้ว/กรุณาเข้าสู่ระบบ!!');
                }
                else
                {
                  $this->session->set_flashdata('msg','เกิดข้อผิดพลาดในการสมัคร กรุณาลองใหม่อีกครั้ง!!');
                }
              }
            }
              
  
             
              redirect('Login');
          }
           
      }
}

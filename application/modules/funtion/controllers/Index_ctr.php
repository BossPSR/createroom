<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		$this->load->model('Category_model');
    $this->load->model('Room_model');
		
  }
  
  function generateRandomString($length = 7) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

	public function index()
	{
      if ($this->session->userdata('username') != ''){
          $data['user'] = $this->db->get_where('tbl_users',['username' => $this->session->userdata('username')])->row();
          $data['rooms'] = $this->db->get('tbl_rooms')->result_array();
          $this->load->view('option/header'); 
          $this->load->view('index', $data);
          $this->load->view('option/footer');
          
      }else{
          $this->load->view('login');
      }
		

	}

	public function add_room()
	{
		if ($this->session->userdata('username') != '')
        {

			$this->load->view('option/header');
			$this->load->view('add_room');
			$this->load->view('option/footer');
        }else{
            $this->load->view('login');
        }
		

	}
	  public function add_room_process()
    {
      if ($this->session->userdata('username') != '')
      {
        $teacher = $this->db->get_where('tbl_users',['username' => $this->session->userdata('username')])->row();
        $data = array(
          'room'        => $this->input->post('name_room'),
          'sec'         => $this->input->post('sec'),
          'subject'     => $this->input->post('subject'),
          'teacher_id'  => $teacher->id,
          'limit_room'  => $this->input->post('limit_room'),
          'generate'    => $this->generateRandomString(),
          'create_date' => date('Y-m-d'),
          'created_at'  => date('Y-m-d H:i:s'),
          'updated_at'  => date('Y-m-d H:i:s')
        );

        $success = $this->db->insert('tbl_rooms',$data);

        if($success > 0)
        {
          $this->session->set_flashdata('response','สร้างห้องเรียนเรียบร้อยแล้ว');
        }else{

          $this->session->set_flashdata('msg','สร้างห้องเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
        }
          redirect('index');
      }else{
          $this->load->view('login');
      }
    }

    public function detail_room()
    {
      if ($this->session->userdata('username') != '')
          {
            $data['room'] = $this->db->get_where('tbl_rooms',['id',$this->input->get('id')])->row();
            $this->load->view('option/header');
            $this->load->view('detail_room',$data);
            $this->load->view('option/footer');
          }else{
              $this->load->view('login');
          }
      
  
    }

    public function edit_room()
    {
      if ($this->session->userdata('username') != '')
          {
              $data['room'] = $this->db->get_where('tbl_rooms',['id'=> $this->input->get('id')])->row();             
              $this->load->view('option/header');
              $this->load->view('edit_room',$data);
              $this->load->view('option/footer');
          }else{
              $this->load->view('login');
          }
    }

    public function edit_room_process()
    {
      if ($this->session->userdata('username') != '')
      {
        $teacher = $this->db->get_where('tbl_users',['username' => $this->session->userdata('username')])->row();
        $data = array(
          'room'        => $this->input->post('name_room'),
          'sec'         => $this->input->post('sec'),
          'subject'     => $this->input->post('subject'),
          'teacher_id'  => $teacher->id,
          'limit_room'  => $this->input->post('limit_room'),
          'generate'    => $this->generateRandomString(),
          'updated_at'  => date('Y-m-d H:i:s')
        );
        $this->db->where('id',$this->input->post('id'));
        $success = $this->db->update('tbl_rooms',$data);

        if($success > 0)
        {
          $this->session->set_flashdata('response','สร้างห้องเรียนเรียบร้อยแล้ว');
        }else{

          $this->session->set_flashdata('msg','สร้างห้องเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
        }
          redirect('index');

      }else{
        $this->load->view('login');
      }
    }


}

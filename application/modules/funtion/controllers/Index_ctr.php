<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		$this->load->model('Category_model');
    $this->load->model('Room_model');
		
	}

	public function index()
	{
      if ($this->session->userdata('username') != ''){
          $data['user'] = $this->db->get_where('tbl_users',['username' => $this->session->userdata('username')])->row();
          $data['rooms'] = $this->Room_model->teacherRoom();
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
      $teacher = $this->db->get_where('tbl_users',['username' => $this->session->userdata('username')])->row();
      $data = array(
        'room'        => $this->input->post('name_room'),
        'sec'         => $this->input->post('sec'),
        'subject'     => $this->input->post('subject'),
        'teacher_id'  => $teacher->id,
        'limit_room'  => $this->input->post('limit_room'),
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
    }
    public function Edit_category()
    {
      if ($this->session->userdata('username') != '')
          {
  
        $this->load->view('option/header');
        $this->load->view('edit_category');
        $this->load->view('option/footer');
          }else{
              $this->load->view('login');
          }
      
  
    }

	  public function Edit_category_Complete()
    {
      $id        = $this->input->post('id');
      $category        = $this->input->post('category');
     

      $data = array(
        'category'     => $category
      
      );		
      		     $this->db->where('id',$id);
      $success = $this->db->update('tbl_category',$data);

      if($succeed > 0)
      {
        $this->session->set_flashdata('msg','แก้ไขหมวดหมู่งานไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }else{
        $this->session->set_flashdata('response','แก้ไขหมวดหมู่งานเรียบร้อยแล้ว');
      }
        redirect('Category');

}

 public function category_delete()
    {
      $id = $this->input->get('id');

      if ($this->Category_model->category_delete($id))
      {
        echo "<script language=\"JavaScript\">";
			  echo "alert('ลบข้อมูลสำเร็จ !!');window.location='Category';";
			  echo "</script>";
      }
      else
      {
        echo "<script language=\"JavaScript\">";
			  echo "alert('ไม่สามารถลบข้อมูลได้ !!');window.location='Category';";
			  echo "</script>";
      }
        return redirect('Category');
    }






}

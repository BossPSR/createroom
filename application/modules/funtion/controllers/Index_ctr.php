<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		$this->load->model('Category_model');

		
	}

	public function index()
	{
      if ($this->session->userdata('username') != ''){
          $data['user'] = $this->db->get_where('tbl_users',['username' => $this->session->userdata('username')])->row();
          $this->load->view('option/header'); 
          $this->load->view('index', $data);
          $this->load->view('option/footer');
          
      }else{
          $this->load->view('login');
      }
		

	}

	public function add_category()
	{
		if ($this->session->userdata('username') != '')
        {

			$this->load->view('option/header');
			$this->load->view('add_category');
			$this->load->view('option/footer');
        }else{
            $this->load->view('login');
        }
		

	}
	  public function add_category_com()
    {
      $category        = $this->input->post('category');
     

      $data = array(
        'category'     => $category
       
      );
      $success = $this->db->insert('tbl_category',$data);

      if($succeed > 0)
      {
        $this->session->set_flashdata('msg','เพิ่มหมวดหมู่งานไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }else{
        $this->session->set_flashdata('response','เพิ่มหมวดหมู่งานเรียบร้อยแล้ว');
      }
        redirect('Category');
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_ctr extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Category_model');
    $this->load->model('Room_model');
    $this->load->library('zoom');
  }

  function generateRandomString($length = 7)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//หน้าแรกของอาจารย์
	public function index()
	{
      if ($this->session->userdata('username') != ''){
          $data['user'] = $this->db->get_where('tbl_teacher',['username' => $this->session->userdata('username')])->row();
          if(empty($data['user'])){
              $this->load->view('login');
          }
          $data['rooms'] = $this->db->order_by('id', 'DESC')->get('tbl_rooms')->result_array();
          $this->load->view('option/header'); 
          $this->load->view('index', $data);
          $this->load->view('option/footer');
          
      }else{
          $this->load->view('login');
      }
     
  }

  public function add_room()
  {
    if ($this->session->userdata('username') != '') {
      $data['type'] = $this->input->get('type');

      $this->load->view('option/header');
      $this->load->view('add_room', $data);
      $this->load->view('option/footer');
    } else {
      $this->load->view('login');
    }
  }
  public function add_room_process()
  {
    if ($this->session->userdata('username') != '') {
      $zoom_id    = 'n6in45JnSje-aQ2_8q6DnQ';
      $datestart  = date('Y-m-d H:i:s');
      $dateend    = date('Y-m-d H:i:s');
      $teacher    = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $data = array(
        'room'        => $this->input->post('name_room'),
        'sec'         => $this->input->post('sec'),
        'subject'     => $this->input->post('subject'),
        'teacher_id'  => $teacher->id,
        'limit_room'  => $this->input->post('limit_room'),
        'generate'    => $this->generateRandomString(),
        'start_time'  => $this->input->post('start_time'),
        'end_time'    => $this->input->post('end_time'),
        'create_date' => date('Y-m-d'),
        'created_at'  => date('Y-m-d H:i:s'),
        'updated_at'  => date('Y-m-d H:i:s')
      );

      if ($this->db->insert('tbl_rooms', $data)) {
        $insert_id = $this->db->insert_id(); 
        $zoom_data = $this->zoom->create_meeting($zoom_id, "zoomcreate.com", "by zoomcreate.com", $datestart, $dateend);
        if ($zoom_data['status']) {
          $schedule_data = array(
            'teacher_id'            => $teacher->id,
            'room_id'               => $insert_id,
            'start'                 => $datestart,
            'appointment_type_id'   => 2,
            'meeting_id'            => $zoom_data['meeting_id'],
            'zoom_host_url'         => $zoom_data['host_url'],
            'zoom_url'              => $zoom_data['join_url'],
            'create_at'             => date("Y-m-d H:i:s"),
            'create_by'             => $teacher->id,
          );
          $success = $this->db->insert('tbl_zoom', $schedule_data);
        }

        if ($success > 0) {
          $this->session->set_flashdata('response', 'สร้างห้องเรียนเรียบร้อยแล้ว');
        } else {

          $this->session->set_flashdata('msg', 'สร้างห้องเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
        }

        if ($this->input->post('type') == "teacher") {
          redirect('teacher_my_room');
        } else {
          redirect('index');
        }
      } else {
        $this->load->view('login');
      }
    }
  }

  public function detail_room()
  {
    if ($this->session->userdata('username') != '') {
      $data['room'] = $this->db->get_where('tbl_rooms', ['id' => $this->input->get('id')])->row();
      $data['type'] = $this->input->get('type');
      $this->load->view('option/header');
      $this->load->view('detail_room', $data);
      $this->load->view('option/footer');
    } else {
      $this->load->view('login');
    }
  }

  public function edit_room()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $data['room'] = $this->db->get_where('tbl_rooms', ['id' => $this->input->get('id'), 'teacher_id' => $teacher->id])->row();
      $data['type'] = $this->input->get('type');

      $this->load->view('option/header');
      $this->load->view('edit_room', $data);
      $this->load->view('option/footer');
    } else {
      $this->load->view('login');
    }
  }

  public function edit_room_process()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->post('id'), 'teacher_id' => $teacher->id])->row();

      if (empty($room)) {
        redirect('index');
      }

      $data = array(
        'room'        => $this->input->post('name_room'),
        'sec'         => $this->input->post('sec'),
        'subject'     => $this->input->post('subject'),
        'teacher_id'  => $teacher->id,
        'limit_room'  => $this->input->post('limit_room'),
        'generate'    => $this->generateRandomString(),
        'start_time'  => $this->input->post('start_time'),
        'end_time'    => $this->input->post('end_time'),
        'updated_at'  => date('Y-m-d H:i:s')
      );
      $this->db->where('id', $this->input->post('id'));
      $success = $this->db->update('tbl_rooms', $data);

      if ($success > 0) {
        $this->session->set_flashdata('response', 'แก้ไขห้องเรียนเรียบร้อยแล้ว');
      } else {

        $this->session->set_flashdata('msg', 'แก้ไขห้องเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }

      if ($this->input->post('type') == "teacher") {
        redirect('teacher_my_room');
      } else {
        redirect('index');
      }
    } else {
      $this->load->view('login');
    }
  }

  public function delete_room()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->get('id'), 'teacher_id' => $teacher->id])->row();

      if (empty($room)) {
        redirect('index');
      }

      $deletePathAll = $this->db->get_where('tbl_file_teacher', ['room_id' => $this->input->get('id')])->result_array();
      foreach ($deletePathAll as $deletePath) {

        if (!empty($deletePath['path'])) {
          unlink('./' . $deletePath['path'] . '/' . $deletePath['file_name']);
          $this->db->where('id', $deletePath['id']);
          $this->db->delete('tbl_file_teacher');
        }
      }

      $this->db->where('id', $this->input->get('id'));
      $success = $this->db->delete('tbl_rooms');

      if ($success > 0) {
        $this->session->set_flashdata('response', 'ลบห้องเรียนเรียบร้อยแล้ว');
      } else {

        $this->session->set_flashdata('msg', 'ลบห้องเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }
      if ($this->input->get('type') == "teacher") {
        redirect('teacher_my_room');
      } else {
        redirect('index');
      }
    } else {
      $this->load->view('login');
    }
  }

  public function file_teacher()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->get('id'), 'teacher_id' => $teacher->id])->row_array();
      if (empty($room)) {
        redirect('index');
      }
      $file = $this->db->get_where('tbl_file_teacher', ['room_id' => $room['id']])->result_array();

      $data['room'] = $room;
      $data['file'] = $file;
      $data['type'] = $this->input->get('type');

      $this->load->view('option/header');
      $this->load->view('file_teacher', $data);
      $this->load->view('option/footer');
    } else {
      $this->load->view('login');
    }
  }

  public function file_teacher_process()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->post('room_id'), 'teacher_id' => $teacher->id])->row();

      if (empty($room)) {
        redirect('index');
      }

      $this->load->library('upload');
      $path = 'uploads/file/teacher/room/' . $room->id . '/' . strtotime(date('Y-m-d H:i:s'));
      $config['upload_path'] = $path;
      $config['allowed_types'] = '*';
      $config['max_size']     = '200480';
      $config['max_width'] = '50000';
      $config['max_height'] = '50000';

      if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
      }

      $this->upload->initialize($config);
      if ($_FILES['file_name']['name']) {
        if ($this->upload->do_upload('file_name')) {
          $gamber     = $this->upload->data();
          $data = array(
            'file_name'   => $gamber['file_name'],
            'path'        => $path,
            'room_id'     => $this->input->post('room_id'),
            'description'     => $this->input->post('description'),
            'create_date' => date('Y-m-d'),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
          );
          $success = $this->db->insert('tbl_file_teacher', $data);
        }
      }





      if ($success > 0) {
        $this->session->set_flashdata('response', 'เพิ่มเอกสารประกอบการเรียนเรียบร้อยแล้ว');
      } else {

        $this->session->set_flashdata('msg', 'เพิ่มเอกสารประกอบการเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }
      redirect('file_teacher?id=' . $this->input->post('room_id'));
    } else {
      $this->load->view('login');
    }
  }

  public function downloadDocument()
  {

    if ($this->session->userdata('username') != '') {
      $id = $this->input->get('id');

      if (!empty($id)) {
        $myFile = $this->db->get_where('tbl_file_teacher', ['id' => $id])->row();
        if (isset($myFile)) {
          $this->load->helper('download');
          force_download(FCPATH . $myFile->path . '/' . $myFile->file_name, null);
        }
      }
      redirect('file_teacher');
    } else {
      redirect('login');
    }
  }

  public function teacher_my_room()
  {
    if ($this->session->userdata('username') != '') {
      $data['user'] = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row_array();
      if (empty($data['user'])) {
        $this->load->view('login');
      }
      $data['rooms'] = $this->db->order_by('id', 'DESC')->get_where('tbl_rooms', ['teacher_id' => $data['user']['id']])->result_array();
      $this->load->view('option/header');
      $this->load->view('teacher_my_room', $data);
      $this->load->view('option/footer');
    } else {
      $this->load->view('login');
    }
  }

  public function delete_file_teacher()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->get('room_id'), 'teacher_id' => $teacher->id])->row();

      if (empty($room)) {
        redirect('index');
      }

      $deletePath = $this->db->get_where('tbl_file_teacher', ['id' => $this->input->get('id')])->row_array();
      if (!empty($deletePath['path'])) {
        unlink('./' . $deletePath['path'] . '/' . $deletePath['file_name']);
      }

      $this->db->where('id', $this->input->get('id'));
      $success = $this->db->delete('tbl_file_teacher');

      if ($success > 0) {
        $this->session->set_flashdata('response', 'ลบเอกสารประกอบการเรียนเรียบร้อยแล้ว');
      } else {

        $this->session->set_flashdata('msg', 'ลบเอกสารประกอบการเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }

      redirect('file_teacher?id=' . $this->input->post('room_id'));
    } else {
      $this->load->view('login');
    }
  }

  public function box_homework()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->get('id'), 'teacher_id' => $teacher->id])->row_array();
      if (empty($room)) {
        redirect('index');
      }
      $box_home_work = $this->db->get_where('tbl_box_home_work', ['room_id' => $this->input->get('id')])->result_array();
      $data['room'] = $room;
      $data['type'] = $this->input->get('type');
      $data['box_home_work'] = $box_home_work;

      $this->load->view('option/header');
      $this->load->view('box_homework', $data);
      $this->load->view('option/footer');
    } else {
      $this->load->view('login');
    }
  }

  public function box_homework_process()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->post('room_id'), 'teacher_id' => $teacher->id])->row();

      if (empty($room)) {
        redirect('index');
      }

      $data = array(
        'title'        => $this->input->post('title'),
        'description'    => $this->input->post('description'),
        'later_than'     => $this->input->post('date') . ' ' . $this->input->post('time'),
        'room_id'  => $this->input->post('room_id'),
        'create_date'  => date('Y-m-d'),
        'created_at'    => date('Y-m-d H:i:s'),
        'updated_at'  => date('Y-m-d H:i:s')
      );
      $success = $this->db->insert('tbl_box_home_work', $data);

      if ($success > 0) {
        $this->session->set_flashdata('response', 'สร้างกล่องส่งการบ้านเรียบร้อยแล้ว');
      } else {

        $this->session->set_flashdata('msg', 'สร้างกล่องส่งการบ้านไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }

      if ($this->input->post('type') == "teacher") {
        redirect('box_homework?id=' . $this->input->post('room_id') . '&type=teacher');
      } else {
        redirect('box_homework?id=' . $this->input->post('room_id'));
      }
    } else {
      $this->load->view('login');
    }
  }

  public function checkHomework_student()
  {

    if ($this->session->userdata('username') != '') {
      $id = $this->input->get('id');

      if (!empty($id)) {
        $myFile = $this->db->get_where('tbl_home_work', ['id' => $id])->row();
        if (isset($myFile)) {
          $this->load->helper('download');
          force_download(FCPATH . $myFile->path . '/' . $myFile->file_name, null);
        }
      }
      redirect('box_homework');
    } else {
      redirect('login');
    }
  }

  public function deleteBox_homework()
  {
    if ($this->session->userdata('username') != '') {
      $teacher = $this->db->get_where('tbl_teacher', ['username' => $this->session->userdata('username')])->row();
      $room = $this->db->get_where('tbl_rooms', ['id' => $this->input->get('room_id'), 'teacher_id' => $teacher->id])->row();

      if (empty($room)) {
        redirect('index');
      }
      $boxWork = $this->db->get_where('tbl_box_home_work',['id' => $this->input->get('id')])->row();
      $checkDate = strtotime($boxWork->later_than);
      $dateToday = strtotime(date('Y-m-d H:i:s'));
      if ($dateToday > $checkDate) {
        $this->session->set_flashdata('msg','ไม่สามารถลบกล่องส่งการบ้านได้เนื่องจากครบวันที่กำหนดส่งแล้ว !!');
        if ($this->input->get('type') == "teacher") {
          redirect('box_homework?id=' . $this->input->get('room_id') . '&type=teacher');
        } else {
          redirect('box_homework?id=' . $this->input->get('room_id'));
        }
      }
    
      $this->db->where('id', $this->input->get('id'));
      $success = $this->db->delete('tbl_box_home_work');

      if ($success > 0) {
        $this->session->set_flashdata('response', 'ลบกล่องส่งการบ้านเรียบร้อยแล้ว');
      } else {

        $this->session->set_flashdata('msg', 'ลบกล่องส่งการบ้านไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
      }

      $deletePath = $this->db->get_where('tbl_home_work', ['box_home_work_id' => $this->input->get('id')])->result_array();
      foreach ($deletePath as $deletePath) {
        if (!empty($deletePath['path'])) {
          unlink('./' . $deletePath['path'] . '/' . $deletePath['file_name']);
        }
      }


      $this->db->where('box_home_work_id', $this->input->get('id'));
      $this->db->delete('tbl_home_work');

      if ($this->input->get('type') == "teacher") {
        redirect('box_homework?id=' . $this->input->get('room_id') . '&type=teacher');
      } else {
        redirect('box_homework?id=' . $this->input->get('room_id'));
      }
    } else {
      $this->load->view('login');
    }
  }

  public function point_homework()
  {
      $id = $this->input->post('id');
      $point_homework = $this->input->post('point_homework');
      $this->db->where('id',$id);
      $this->db->update('tbl_home_work',['point_homework' => $point_homework,'updated_at' => date('Y-m-d H:i:s')]);

      $result = [];
      $result['successfully'] = true;
      $result['message'] = "add point homework successfully";
      echo json_encode($result);

  }

  public function google_hangouts_success()
	{
		$teacher_id = $this->input->post('teacher_id');
		$google_hangouts = $this->input->post('google_hangouts');
		$type = $this->input->post('type');
		$this->db->where('id',$teacher_id);
		$success = $this->db->update('tbl_teacher',['google_hangouts' => $google_hangouts]);

		if($success > 0)
        {
          $this->session->set_flashdata('response','สร้างห้องเรียนเรียบร้อยแล้ว');
        }else{

          $this->session->set_flashdata('msg','สร้างห้องเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
        }
		
		if ($type == "index") {
			redirect('index');
		}
		
		if ($type == "teacher_my_room") {
			redirect('teacher_my_room');
		}
		
	}
}

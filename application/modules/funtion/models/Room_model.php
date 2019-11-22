
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Room_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
       public function teacherRoom()
    {
        $this->db->from('tbl_rooms');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_rooms.teacher_id');
        $data = $this->db->get();
        return $data->result_array();

       
    }
    
    public function job_post_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_postin');
    }
}

?>
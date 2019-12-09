<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function login($username, $password)
    {
       $this->db->where('username', $username);
       $this->db->where('password', $password);
       $query = $this->db->get('tbl_teacher');

       if ($query->num_rows() > 0)
       {
        return true;
       }
       else
       {
        return false;
       }

    }
}

?>
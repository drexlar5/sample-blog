<?php 

class HomeModel extends CI_Model{

  function __construct()
  {
    parent::__construct();
  }

  function getUsers(){
    $query = $this->db->get('coder');

    if ($query->num_rows() > 0){
      return $query->result();
    }else {
      return null;
    }

  }

}

?>
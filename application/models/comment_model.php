<?php
  class comment_model extends CI_Model
  {
    public function __construct()
    {
      // load database if it is not loaded in auto load
      // $this->load->database();
    }

    public function create_comment($post_id){

      // create array $data and pass in the parameters
      $data = array(
        'post_id' => $post_id,
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'body' => $this->input->post('body'),
     );

     //  insert the data to the table in the database
     return $this->db->insert('comments', $data);
    }

    public function get_comments($post_id){

      $query = $this->db->get_where('comments', array('post_id' => $post_id));

     //  insert the data to the table in the database
     return $query->result_array('comments', $query);
    }

  }

?>
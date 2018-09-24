<?php 

  class category_model extends CI_Model{
    public function __construct(){
      // load the database
      // load database if it is not loaded in auto load
      // $this->load->database();
    }

    public function create_category(){
      // get the name value from the input field and put it in the database
      $data = array(
        'name' => $this->input->post('name'),
      );

      // insert the value into the categories table
      return $this->db->insert('categories', $data);
    }

    function get_categories(){
      // order the cateories table by name
      $this->db->order_by('name');

      // get the data from the table and store in query
      $query = $this->db->get('categories');

      // return the data as an array
      return $query->result_array();
    }

    function get_category($id){

      // get the data from the table and store in query using id
      $query = $this->db->get_where('categories', array('id' => $id));

      // return the data as a row array
      return $query->row();
    }
  }

?>
<?php
  class user_model extends CI_Model
  {

    // Register User
    public function register($enc_password){
      // create user data array
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'password' => $enc_password,
        'zipcode' => $this->input->post('zipcode'),
      );

      // insert the data into the users database
      return $this->db->insert('users', $data);
    }

    // Login User
    public function login($username, $password){

      // validate
      // search the database for info matching data received
      $this->db->where('username', $username);
      $this->db->where('password', $password);

      $result = $this->db->get('users');

      // check if the username and password exists
      if ($result->num_rows() == 1) {
        return $result->row(0)->id;
      } else {
        return false;
      }
      
    }

    public function check_username_exists($username){

      // check for the username in the database
      $query = $this->db->get_where('users', array('username' => $username));

      // check if the username exists
      if (empty($query->row_array())) {
        return true;
      } else {
        return false;
      }
      

    }

    public function check_email_exists($email){

      // check for the username in the database
      $query = $this->db->get_where('users', array('email' => $email));

      // check if the username exists
      if (empty($query->row_array())) {
        return true;
      } else {
        return false;
      }
      

    }
  }

?>
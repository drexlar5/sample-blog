<?php 

  class Users extends CI_Controller{
    
    // Register User
    public function register(){
      $data['title'] = 'Sign Up';

      // set the form validation rules
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required | valid_email | callback_check_email_exists');
      $this->form_validation->set_rules('username', 'Username', 'required | callback_check_username_exists');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('password2', 'Confirm Passoword', 'matches[password]');


      if ($this->form_validation->run() === FALSE) {
        // load post registration if the form doesnt submit
        $this->load->view('templates/header');
        $this->load->view('users/register', $data);
        $this->load->view('templates/footer');
      } else {
        // Encrypt password
        $enc_password = md5($this->input->post('password'));
        $this->user_model->register($enc_password);

        // send message using session library
        $this->session->set_flashdata('user_registered', 'You are now registered and can login');

        redirect('posts');
      }
      
    }

    // Log in User
    public function login(){

      $data['title'] = 'Sign In';

      // set the form validation rules
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');


      if ($this->form_validation->run() === FALSE) {

        // load post registration if the form doesnt submit
        $this->load->view('templates/header');
        $this->load->view('users/login', $data);
        $this->load->view('templates/footer');
      } else {

        // Get Username
        $username = $this->input->post('username');

        // Get and encrypt the password
        $password = md5($this->input->post('password'));

        // Login User
        $user_id = $this->user_model->login($username, $password);

        if ($user_id) {
          // create the session
          $user_data = array(
            'user_id' => $user_id,
            'username' => $username,
            'logged_in' => true,
          );

          // save the userdata araay in the session cookie
          $this->session->set_userdata($user_data);

          // send message using session library
          $this->session->set_flashdata('user_loggedin', 'You are now logged in');

          redirect('posts');
        }else{
          // send message using session library
          $this->session->set_flashdata('login_failed', 'Login is invalid');

          redirect('users/login');
        }

      }
      
    }

    // Log in User
    public function logout(){
      // unset user data session
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');

      // send message using session library
      $this->session->set_flashdata('user_loggedout', 'You are now logged out');

      redirect('users/login');
      
    }

    // custom callback functio to check if username exists
    function check_username_exists($username){
      $this->form_validation->set_message('check_username_exists', 'That Username is taken. Please choose a different one');

      if ($this->user_model->check_username_exists($username)) {
        return true;
      } else {
        return false;
      }
      
      
    }

    // custom callback functio to check if email exists
    function check_email_exists($email){
      $this->form_validation->set_message('check_username_exists', 'That Email is taken. Please choose a different one');

      if ($this->user_model->check_email_exists($email)) {
        return true;
      } else {
        return false;
      }
      
      
    }
  }

?>
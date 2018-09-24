<?php

  class Categories extends CI_Controller{

    public function index(){
      // set the title
      $data['title'] = 'Categories';

      // get the categories from the database in category table
      $data['categories'] = $this->category_model->get_categories();

      // load the cateories view
      $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');  


    }

    public function create(){
      // check login before giving create categories access
      if(!$this->session->userdata('logged_in')){
        redirect('users/login');
      }  

      $data['title'] = 'Create Categories';

      // set rules for the category name that it must be selected
      $this->form_validation->set_rules('name', 'Name', 'required');

      // check if the rule set is passed
      if ($this->form_validation->run() === FALSE){
        // load the categories create view
        $this->load->view('templates/header');
        $this->load->view('categories/create', $data);
        $this->load->view('templates/footer');        
      }else{
        // create the model
        $this->category_model->create_category();

        // send message using session library
        $this->session->set_flashdata('category_created', 'Your category has been created');

        redirect('categories');
      }
    }

    public function posts($id){
      // creating the title from the category id
      $data['title'] = $this->category_model->get_category($id)->name;

      // fetching the post id from Post model
      $data['posts'] = $this->Post_model->get_posts_by_category_id($id);

       // load the categories post view
       $this->load->view('templates/header');
       $this->load->view('posts/index', $data);
       $this->load->view('templates/footer');
    }

  }
?>
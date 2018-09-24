<?php

  class Comments extends CI_Controller{

    public function create($post_id){
      // retrieve the slug from the post input
      $slug = $this->input->post('slug');

      // get the post of corresponding slug
      $data['post'] = $this->Post_model->get_posts($slug);

      // set the form validation rules
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('body', 'Body', 'required');

      if ($this->form_validation->run() === FALSE) {
        # code...
        // load post view if the form doesnt submit
        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
      } else {
        # code...
        // create the comment and goto post page
        $this->comment_model->create_comment($post_id);
        redirect('posts/'.$slug);
      }
      

    }
  }

?>